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
use App\Models\Claims;
use Carbon\Carbon;
use Auth,Str,Storage;
use Xendit\Xendit;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifMailCargoRisk;
use App\Jobs\RiskNotifJobs;
use Illuminate\Support\Facades\Http;

class QuoteController extends Controller
{
    public function index() {
        $good = Repository::all();
        $currency = json_decode($this->getCurrencyName());
        return view('Frontend.quote', compact('good', 'currency'));
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
        $tengah = $this->getCurrencyTengah($data['Currency']);
        $convert = $data['sumInsured'] * $tengah;
        $data['convert'] = $convert;
        $data['rate_currency'] = $tengah;

        $userId = Auth::id();
        $userProductIds = User::findOrFail($userId)->product_list ?? [];
        
        $products = Products::with('rate');
        if (Auth::user()->account_type == 'verify') {
            $products = $products->whereIn('id', $userProductIds)->get();
        }else {
            $products = $products->where('account_type','retail')->get();
        }

        if ($request->goodsType === 'other' || (isset($request->builtYear) && $this->builtYear($request->builtYear) >= 23)) {
            $is_risk = 1;
        }else {
            $is_risk = 0;
        }

        $arrproduct = [];
        $result = [];

        foreach ($products as $product) {
            $productGoodsType = $this->check_gdtype($product->goods_type, $request->goodsType);
            if ($productGoodsType->isNotEmpty()) {
                $arrproduct[] = $productGoodsType;
                $additionalCostSum = !empty(collect($product->additional_cost)->sum('value')) ? collect($product->additional_cost)->sum('value') : 0;
                $productData = [
                    'product_data' => $product,
                    'additional_sum' => floatval($additionalCostSum),
                    'icc_price' => [
                        'a' => $product->rate->icc_a['is_active'] === 'on' ? $this->calculatePrice($data['sumInsured'], $product->rate->icc_a, $additionalCostSum, $product->discount) : null,
                        'b' => $product->rate->icc_b['is_active'] === 'on' ? $this->calculatePrice($data['sumInsured'], $product->rate->icc_b, $additionalCostSum, $product->discount) : null,
                        'c' => $product->rate->icc_c['is_active'] === 'on' ? $this->calculatePrice($data['sumInsured'], $product->rate->icc_c, $additionalCostSum, $product->discount) : null,
                    ],
                ];

                $result[] = $productData;
            }
        }

        if ($arrproduct == []) {
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

    function calculatePrice($sumInsured, $rate, $additionalCostSum, $dsc) {
        if ($rate['premium_type'] == 'fixed') {
            $sum =  ceil(($rate['premium_value']+$additionalCostSum)-(($rate['premium_value']+$additionalCostSum)*$dsc/100));
        }else {
            $sum = ceil((($sumInsured * $rate['premium_value'])+$additionalCostSum)-((($sumInsured * $rate['premium_value'])+$additionalCostSum)*$dsc/100));
            // if ($sum_rate < 100000) {
            //     $sum = 100000 +$additionalCostSum;
            // }else{
            //     $sum = $sum_rate +$additionalCostSum;
            // }
        }
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
            $callculate_data = $request->is_risk == "1" ? null : $this->calculateData($data, $product, $data->premium_amount);
            $order->deductibles =  $product->deductibles ?? null;
            $order->total_sum_insured =   $data->data->sumInsured ?? 0;  // ke 0
            $order->rate = $product->rate->{'icc_' . strtolower($data->icc_selected)}['premium_value'] ?? null;  // ke 0.0
            $order->premium_amount = $data->premium_amount ?? 0;  // ke 0
            $order->premium_calculation = $callculate_data;
            $order->premium_payment_warranty = $product->premium_payment_warranty ?? null;
            $order->security = $product->security ?? null;
            $order->currency = $data->data->Currency ?? null;
            $order->origin_value = $data->data->sumInsured ?? null;
            $order->rate_currency = $data->data->rate_currency ?? null;
            $order->converted = $data->data->convert ?? null;

            // $data = $order;
            // return view('emails.risk',compact('data'));
            // return $order;

            $order->save();

            // $this->risk_notif($order);


            $transaction = new Transactions;
            $transaction->order_id = $order->id;
            $transaction->pn_number = 'PN-'.date('Ymd').'-'.$order->id;
            $transaction->policy_number = 'POL-'.date('Ymd').'-'.$order->id;
            $transaction->payment_total = $data->premium_amount ?? null; //???
            $transaction->payment_method = !empty($request["payment_method"]) ? $request["payment_method"] : null;
            $transaction->start_policy_date = date('Y-m-d');
            $transaction->end_policy_date = date('Y-m-d', strtotime('+1 year'));
            $transaction->risk_status = $data->is_risk === "1" ? 'follow_up' : null;
            $transaction->payment_status = 'unpaid';
            // return $transaction;
            $transaction->save();

            if (Auth::user()->account_type == 'verify' && $data->is_risk !== "1") {
                $trans_update = Transactions::find($transaction->id);
                $trans_update->doc_policy = $this->psummary($transaction);
                $trans_update->doc_premium = $this->pnote($transaction);
                $trans_update->save();
            }

            DB::commit();



            if (Auth::user()->account_type == 'retail' && $data->is_risk !== "1") {
                $trx_id = $transaction->id;
                $pay_method = $request["payment_method"];
                $pay_total = $data->premium_amount;
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
    public function psummary($data)
    {
        $pdf = Pdf::loadView('pdf.policy_summary',compact('data'));
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
        $calculateData = "((" . $data->data->sumInsured . $premiumSymbol . $product->rate->{'icc_' . strtolower($data->icc_selected)}['premium_value'] . ") + " . array_sum(array_map('intval', array_column($product->additional_cost, 'value'))) . ") - " . $product->discount ." = ".$premi;
        return $calculateData;
    }

    function getCurrencyName() {
        $response = Http::get('https://momentic.salvus.id/api/checkcurrancy')->body();
        return $response;
    }

    function getCurrencyTengah($currency) {
        $response = Http::get('https://momentic.salvus.id/api/checkcurrancy/'.$currency)['tengah'];
        return $response;
    }


}
