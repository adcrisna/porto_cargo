<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Repository;
use App\Models\IccRate;
use App\Models\Transactions;
use App\Models\Countries;
use App\Models\Claims;
use Carbon\Carbon;
use Auth,Str,Storage;
use Xendit\Xendit;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifMailCargoRisk;
use App\Jobs\RiskNotifJobs;
use Illuminate\Support\Facades\Http;
use Log;
use App\Jobs\MomenticConnection;

class QuoteController extends Controller
{
    public function index() {
        $good = Repository::all();
        $countries = Countries::select(["id","country_name"])->get();
        $currency = json_decode($this->getCurrencyName());
        return view('Frontend.quote', compact('good', 'currency',"countries"));
    }

    public function confirmation(Request $request) {
        $data =
            [
                "data" => json_decode($request->insured_detail),
                "product_id" => $request->product_id ?? null,
                "icc_selected" => $request->icc_selected ?? null,
                "premium_amount" => $request->premium_amount ?? null,
                "is_risk" => $request->is_risk,
                "account_type" => Auth::user()->account_type,
            ];
        
            if (Auth::user()->account_type != 'verify' && !empty($data->premium_amount) && $data->premium_amount < 10000) {
                return redirect()->route('quote.index')->with('warning', 'Total premium amount cannot be less than IDR 10.000,00. Please reorder.');
            }
            
            
        $product = Products::find($request->product_id);
        return view('Frontend.confirmation',compact('data','product'));
    }

    function calculation(Request $request) {
        if (empty($request->all()) ) {
            return redirect()->route('quote.index')->with('error', 'Please fill data for process!.');
        }

        $data = $request->all();
        // return $data;
        $tengah = $this->getCurrencyTengah($data['currency']);
        $converted = $data['sumInsured'] * $tengah;
        $data['converted'] = strval($converted);
        $data['rate_currency'] = $tengah;

        $userId = Auth::id();
        $userProductIds = User::findOrFail($userId)->product_list ?? [];
        
        $products = Products::with('rate');

        // if (Auth::user()->account_type == 'verify') {
        //     $products = $products->whereIn('id', $userProductIds)->get();
        // }else {
        //     $products = $products->where('account_type','retail')->get();
        // }

        $transport_type = $data['conveyance'];

        if($data['country_origin'] === "Indonesia" && $data['country_destination'] === "Indonesia") { 
            if (Auth::user()->account_type == 'verify') {
                $products = $products->whereIn('id', $userProductIds)->where(function($query) use ($transport_type) {
                    $query->where('transport_type', 'like', '%'. $transport_type .'%');
                })->get();
            }else {
                $products = $products->where('account_type','retail')->where(function($query) use ($transport_type) {
                    $query->where('transport_type', 'like', '%'. $transport_type .'%');
                })->get();
            }
        } else {
            if (Auth::user()->account_type == 'verify') {
                $products = $products->where('is_international', 1)->whereIn('id', $userProductIds)->where(function($query) use ($transport_type) {
                    $query->where('transport_type', 'like', '%'. $transport_type .'%');
                })->get();
            }else {
                $products = $products->where('is_international', 1)->where('account_type','retail')->where(function($query) use ($transport_type) {
                    $query->where('transport_type', 'like', '%'. $transport_type .'%');
                })->get();
            }
        }
        
        if ($request->goodsType === 'other') {
            $is_risk = 1;
        }else {
            $is_risk = 0;
        }

        // if ($request->goodsType === 'other' || (isset($request->builtYear) && $this->builtYear($request->builtYear) >= 23)) {
        //     $is_risk = 1;
        // }else {
        //     $is_risk = 0;
        // }

        $arrproduct = [];
        $result = [];
        $productData = [];

        foreach ($products as $product) {
            $productGoodsType = $this->check_gdtype($product->goods_type, $request->goodsType);
            if ($productGoodsType->isNotEmpty()) {
                $arrproduct[] = $productGoodsType;
                $additionalCostSum = !empty(collect($product->additional_cost)->sum('value')) ? collect($product->additional_cost)->sum('value') : 0;
                
                if($data['converted'] >= $product->min_tsi && $data['converted'] <= $product->max_tsi) {
                    $productData = [
                        'product_data' => $product,
                        // 'additional_sum' => floatval($additionalCostSum),
                        'additional_sum' => floatval($additionalCostSum),
                        'icc_price' => [
                            'a' => $product->rate->icc_a['is_active'] === 'on' ? $this->calculatePrice($data['currency'], $data['converted'], $product->rate->icc_a, $additionalCostSum, $product->discount, $data['rate_currency'], $product) : null,
                            'b' => $product->rate->icc_b['is_active'] === 'on' ? $this->calculatePrice($data['currency'], $data['converted'], $product->rate->icc_b, $additionalCostSum, $product->discount, $data['rate_currency'], $product) : null,
                            'c' => $product->rate->icc_c['is_active'] === 'on' ? $this->calculatePrice($data['currency'], $data['converted'], $product->rate->icc_c, $additionalCostSum, $product->discount, $data['rate_currency'], $product) : null,
                        ],
                    ];
                    $result[] = $productData;
                }


            }
        }

        // return $arrproduct;
        // return $result;
        
        if ($arrproduct == []) {
            $is_risk = 1;
        }

        if ($result == []) {
            $is_risk = 1;
        }

        // return  $is_risk;
        // foreach ($products as $product) {
        //     $arrproduct[] = $this->check_gdtype($product->goods_type, $request->goodsType);

        //     if (empty($this->check_gdtype($product->goods_type, $request->goodsType)->toArray())) {
        //         $is_risk = 1;
        //     }
        // }
        // return $arrproduct;

        // $result = [];

        // foreach ($products as $product) {
        //     $additionalCostSum = !empty(collect($product->additional_cost)->sum('value')) ? collect($product->additional_cost)->sum('value') : 0;
        //     $productData = [
        //         'product_data' => $product,
        //         'additional_sum' => floatval($additionalCostSum),
        //         'icc_price' => [
        //             'a' => $product->rate->icc_a['is_active'] === 'on' ? $this->calculatePrice($data['sumInsured'], $product->rate->icc_a,$additionalCostSum) : null,
        //             'b' => $product->rate->icc_b['is_active'] === 'on' ? $this->calculatePrice($data['sumInsured'], $product->rate->icc_b,$additionalCostSum) : null,
        //             'c' => $product->rate->icc_c['is_active'] === 'on' ? $this->calculatePrice($data['sumInsured'], $product->rate->icc_c,$additionalCostSum) : null,
        //         ],
        //     ];

        //     $result[] = $productData;
        // }

        // return $data;
        // return $result;

        // usort($result, function ($a, $b) {
        //     return $a['product_data']['icc_price']['a'] - $b['product_data']['icc_price']['a'];
        // });
        // return $result;
        // return $is_risk;


        return view('Frontend.quote_calculate', compact('data','result','is_risk'));
    }

    function check_gdtype($data, $dgtype) {
        return Repository::whereIn('id', $data)
            ->whereRaw('LOWER(name) = ?', [strtolower($dgtype)])
            ->get();
    }

    function calculatePrice($currency, $sumInsured, $rate, $additionalCostSum, $dsc, $rate_currency, $product) {
        // if ($rate['premium_type'] == 'fixed') {
        //     $sum =  ceil((($rate['premium_value']+$additionalCostSum)-(($rate['premium_value']+$additionalCostSum)*$dsc/100))/$rate_currency);
        // }else {
        //     $sum = ceil(((($sumInsured * $rate['premium_value'])+$additionalCostSum)-((($sumInsured * $rate['premium_value'])+$additionalCostSum)*$dsc/100))/$rate_currency);
        if ($rate['premium_type'] == 'fixed') {
            $sum =  (($rate['premium_value']+$additionalCostSum)-(($rate['premium_value']+$additionalCostSum)*$dsc/100))/$rate_currency;
        }else {
            $sum = ((($sumInsured * $rate['premium_value'])+$additionalCostSum)-((($sumInsured * $rate['premium_value'])+$additionalCostSum)*$dsc/100))/$rate_currency;
            // if ($sum_rate < 100000) {
            //     $sum = 100000 +$additionalCostSum;
            // }else{
            //     $sum = $sum_rate +$additionalCostSum;
            // }
        }

        $min_premium_converted = $product->min_premium / $rate_currency;
        
        if($sum <= $min_premium_converted) {
            $sum = $min_premium_converted+($additionalCostSum / $rate_currency);
        }

        // if($sum >= $product->max_premium) {
        //     $sum = $product->max_premium;
        // }
        
        return $sum;
        // ceil(($sumInsured * $rate)+$additionalCostSum);
        // return ceil(($sumInsured * $rate['premium_value'])+$additionalCostSum);
    }

    function builtYear($builtYear) {
        $currentYear = Carbon::now()->year;
        $difference = $currentYear - (int)$builtYear;
        return $difference;
    }

    function saved(Request $request) {
        DB::beginTransaction();
        try {
            if ($request->is_risk == "1") {
                $data = (object)[
                    "data" => json_decode($request->insured_detail),
                    "product_id" => $request->product_id ?? null,
                    "icc_selected" => $request->icc_selected ?? null,
                    "premium_amount" => $request->premium_amount ?? null,
                    "is_risk" => $request->is_risk,
                    "account_type" => Auth::user()->account_type,
                ];
            }else {
                $data = json_decode($request['data']);
            }
            // return $data;

           

            $product = Products::find($data->product_id ?? null);
            $order = new Orders;
            $order->user_id = Auth::user()->id ?? null;
            $order->product_id = $data->product_id ?? null;
            $order->company_name = $data->data->companyName ?? null;
            $order->phone_number = $data->data->phoneNumber ?? null;
            $order->company_email = $data->data->companyEmail ?? null;
            $order->insured_address = $data->data->insuranceAddress ?? null;
            $order->conveyance = $data->data->conveyance ?? null;
            $order->goods_type = $data->data->goodsType ?? null;
            $order->is_risk = $data->is_risk ?? 0;  // ke 0
            $order->specify = $data->data->specify ?? null;
            $order->estimated_time_of_departure = $data->data->departure ?? null;
            $order->estimated_time_of_arrival = $data->data->arrival ?? null;
            $order->point_of_origin = $data->data->pointOforigin ?? null;
            $order->point_of_destination = $data->data->pointOfDestination ?? null;
            $order->sum_insured = $data->data->sumInsured ?? 0;  // ke 0
            $order->invoice_number = $data->data->invoiceNumber ?? null;
            $order->packing_list_number = $data->data->packingListNumber ?? null;
            $order->bill_of_lading_number = $data->data->billOfLanding ?? null;

            $order->travel_permission = $data->data->travelPermission ?? null;
            $order->airway_bill = $data->data->airwayBill ?? null;
            $order->license_plate = $data->data->licensePlate ?? null;
            $order->inter_island = $data->data->interIsland ?? null;
            $order->license_plateinter = $data->data->licensePlateInter ?? null;

            $order->ship_name = $data->data->shipName ?? null;
            $order->vessel_group = $data->data->vesselGroup ?? null;
            $order->container_load = $data->data->containerLoad ?? null;
            $order->vessel_material = $data->data->vesselMaterial ?? null;
            $order->vessel_type = $data->data->vesselType ?? null;
            $order->classified = $data->data->classified ?? null;
            $order->built_year = $data->data->builtYear ?? null;
            
            $order->transhipment = isset($data->data->transhipment) ? ($data->data->transhipment == 'on' ? 'YES' : 'NO') : null;
            $order->coverage = $data->icc_selected ?? null;
            $order->item_description = $data->data->itemDescription ?? null;
            $order->deductibles =  $product->deductibles ?? null;
            $order->total_sum_insured =   $data->data->sumInsured ?? 0;  // ke 0
            $order->rate = $product->rate->{'icc_' . strtolower($data->icc_selected)}['premium_value'] ?? null;  // ke 0.0
            
            $order->premium_amount = $data->premium_amount ?? 0;  // ke 0
            
            $callculate_data = $request->is_risk == "1" ? null : $this->calculateData($data, $product, $data->premium_amount);
            $order->premium_calculation = $callculate_data;

            $order->premium_payment_warranty = $product->premium_payment_warranty ?? null;
            $order->security = $product->security ?? null;
            $order->currency = $data->data->currency ?? null;
            $order->origin_value = $data->data->sumInsured ?? null;
            $order->rate_currency = $data->data->rate_currency ?? null;
            $order->converted = $data->data->converted ?? null;
            
            $order->country_origin = $data->data->country_origin ?? null;
            $order->country_destination = $data->data->country_destination ?? null;
            
            $order->aircraft_name = $data->data->aircraftName ?? null;

            // $data = $order;
            // return view('emails.risk',compact('data'));
            // return $order;

            $order->save();

            // $this->risk_notif($order);

            $transaction = new Transactions;
            $transaction->order_id = $order->id;
            $transaction->pn_number = 'PN-'.date('Ymd').'-'.$order->id;
            $transaction->policy_number = 'POL-'.date('Ymd').'-'.$order->id;
            $transaction->payment_total = $data->premium_amount * $data->data->rate_currency ?? null; //???
            $transaction->payment_method = !empty($request["payment_method"]) ? $request["payment_method"] : null;
            $transaction->start_policy_date = $order->estimated_time_of_departure;   //udah di fix
            $transaction->end_policy_date = $order->estimated_time_of_arrival;  //udah di fix juga , untuk start end nya .
            $transaction->risk_status = $data->is_risk === "1" ? 'follow_up' : null;
            $transaction->payment_status = 'unpaid';
            // return $transaction;
            $transaction->save();

            if (Auth::user()->account_type == 'verify' && $data->is_risk !== "1") {
                $trans_update = Transactions::find($transaction->id);
                $addtional_cost_converted = $trans_update->order->product->additional_cost[0]['value'] / $trans_update->order->rate_currency;
                $trans_update->doc_policy = $this->psummary($transaction, $addtional_cost_converted);
                $trans_update->doc_premium = $this->pnote($transaction);
                $trans_update->save();

                MomenticConnection::dispatch($trans_update->order->id);
                Log::alert("SEND MOMENTIC CONNECTION_FROM_VERIFY_ACCOUNT_ORDER_ID ".$trans_update->order->id);
            }

            DB::commit();

            $xendit_rate= 4500;
            $tax= 0.11;
            $biayaAdmin = $xendit_rate+($xendit_rate*$tax);

            if (Auth::user()->account_type == 'retail' && $data->is_risk !== "1") {
                $trx_id = $transaction->id;
                $pay_method = $request["payment_method"];
                $pay_total = ($data->premium_amount * $data->data->rate_currency) + $biayaAdmin;
                $to_xendit =  $this->payment_store($trx_id,$pay_method,$pay_total);

                return response()->json([
                    'message' => 'success',
                    'type' => 'retail',
                    'link' => $to_xendit
                ]);
            }elseif ($request->is_risk == "1") {
                $this->risk_notif($order);
                return response()->json([
                    'type' => 'risk',
                    'message' => 'success',
                    'link' => route('shipment.index')
                ]);
            }else {
                return response()->json([
                    'type' => 'verify',
                    'message' => 'success',
                ]);
            }



        } catch (Exception $e) {
            DB::rollback();
            return back()->with('status', 'Oops something went wrong :(');
        }
    }


    function payment_store($trx_id,$pay_method,$pay_total) {
        $transaction = Transactions::find($trx_id);
        Xendit::setApiKey(env("SECRET_KEY_XENDIT"));
        $external_id = Str::random(10).'_'.$trx_id;
        $params = [
            'for-user-id' => env("XENDIT_USER_ID"),
            'external_id' =>  $external_id,
            'description' => "Payment CARGO for transaction #".$transaction->order->company_name,
            'amount' => $pay_total,
            'payment_methods' => [$pay_method],
            'success_redirect_url' => route('payment.index'),
            'failure_redirect_url' => route('payment.index'),
        ];

        $createInvoice = \Xendit\Invoice::create($params);
        $transaction->payment_status = strtolower($createInvoice['status']);
        $transaction->payment_link = $createInvoice['invoice_url'];
        $transaction->update();

        return $createInvoice['invoice_url'];

    }

    function risk_notif($order) {
        $recipients = [
            'lisa.anggraini@salvus.co.id','rosa.lina@salvus.co.id',
            'foni.linggajaya@salvus.co.id','ratna.ningsih@salvus.co.id',
            'lazuardi.pratama@salvus.co.id','mega.damaiyanti@salvus.co.id'
        ];

        $data = $order;

        // foreach ($recipients as $recipient) {
        //     RiskNotifJobs::dispatch($recipient, $data);
        // }
        // return "masuk";

        foreach ($recipients as $recipient) {
            $data = $order;
            Mail::to($recipient)->send(new NotifMailCargoRisk($data));
            usleep(400000);
        }
    }


    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function pnote($data)
    {
        $pdf = Pdf::loadView('pdf.premium_note',compact('data'));
        $pdfFileName = 'premium_note_' . date('Ymd_His') . '.pdf';
        $pdfFilePath = 'doc_trx/' . $pdfFileName;
        Storage::disk('public')->put($pdfFilePath, $pdf->output());
        return asset('storage/' . $pdfFilePath);
    }



    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function psummary($data, $addtional_cost_converted)
    {
        $pdf = Pdf::loadView('pdf.policy_summary',compact('data', 'addtional_cost_converted'));
        $pdfFileName = 'policy_summary_' . date('Ymd_His') . '.pdf';
        $pdfFilePath = 'doc_trx/' . $pdfFileName;
        Storage::disk('public')->put($pdfFilePath, $pdf->output());
        return asset('storage/' . $pdfFilePath);
    }


    function calculateData($data, $product, $premi) {

        $premiumType = $product->rate->{'icc_' . strtolower($data->icc_selected)}['premium_type'];
        if ($premiumType == "fixed") {
            $premiumSymbol = "+";
        } else {
            $premiumSymbol = "*";
        }

        $result = (($data->data->converted * $product->rate->{'icc_' . strtolower($data->icc_selected)}['premium_value']) + array_sum(array_map('intval', array_column($product->additional_cost, 'value')))) - $product->discount;

        $calculateData = "((" . $data->data->converted . $premiumSymbol . $product->rate->{'icc_' . strtolower($data->icc_selected)}['premium_value'] . ") + " . array_sum(array_map('intval', array_column($product->additional_cost, 'value'))) . ") - " . $product->discount ." = ". $result . " / " . rtrim($data->data->rate_currency, ".0") . " = " .$premi;
        return $calculateData;
    }

    function getCurrencyName() {
        $response = Http::get('https://momentic.salvus.id/api/checkcurrancy')->body();
        return $response;
    }

    function getCurrencyTengah($currency) {
        $response = Http::get('https://momentic.salvus.id/api/checkcurrancy/'.$currency);
        return $response['tengah'] ?? 1;
    }


}
