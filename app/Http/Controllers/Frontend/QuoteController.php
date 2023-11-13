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
use Auth;
class QuoteController extends Controller
{
    public function index() {
        $good = Repository::all();
        return view('Frontend.quote', compact('good'));
    }

    public function confirmation(Request $request) {
        $data =
            [
                "data" => json_decode($request->insured_detail),
                "product_id" => $request->product_id,
                "icc_selected" => $request->icc_selected,
                "premium_amount" => $request->premium_amount,
                "is_risk" => $request->is_risk,
                "account_type" => Auth::user()->account_type,
            ];
        $product = Products::find($request->product_id);
        // return $data;
        return view('Frontend.confirmation',compact('data','product'));
    }

    function calculation(Request $request) {
        if (empty($request->all()) ) {
            return redirect()->route('quote.index')->with('error', 'Please fill data for process!.');
        }

        $data = $request->all();
        $products = Products::with('rate')->get();

        $result = [];

        foreach ($products as $product) {
            $additionalCostSum = !empty(collect($product->additional_cost)->sum('value')) ? collect($product->additional_cost)->sum('value') : 0;
            $productData = [
                'product_data' => $product,
                'additional_sum' => floatval($additionalCostSum),
                'icc_price' => [
                    'a' => $product->rate->icc_a['is_active'] === 'on' ? $this->calculatePrice($data['sumInsured'], floatval($product->rate->icc_a['premium_value']),$additionalCostSum) : null,
                    'b' => $product->rate->icc_b['is_active'] === 'on' ? $this->calculatePrice($data['sumInsured'], floatval($product->rate->icc_b['premium_value']),$additionalCostSum) : null,
                    'c' => $product->rate->icc_c['is_active'] === 'on' ? $this->calculatePrice($data['sumInsured'], floatval($product->rate->icc_c['premium_value']),$additionalCostSum) : null,
                ],
            ];

            $result[] = $productData;
        }


        if ($request->goodsType === 'other' || (isset($request->builtYear) && $this->builtYear($request->builtYear) >= 23)) {
            $is_risk = 1;
        }else {
            $is_risk = 0;
        }

        // return $is_risk;
        return view('Frontend.quote_calculate', compact('data','result','is_risk'));
    }

    function calculatePrice($sumInsured, $rate, $additionalCostSum) {
        return ceil(($sumInsured * $rate)+$additionalCostSum);
    }

    function builtYear($builtYear) {
        $currentYear = Carbon::now()->year;
        $difference = $currentYear - (int)$builtYear;
        return $difference;
    }

    function saved(Request $request) {

        DB::beginTransaction();
        try {
            $data = json_decode($request['data']);
            $product = Products::find($data->product_id);

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

            $order->ship_name = $data->data->shipName ?? null;
            $order->vessel_group = $data->data->vesselGroup ?? null;
            $order->container_load = $data->data->containerLoad ?? null;
            $order->vessel_material = $data->data->vesselMaterial ?? null;
            $order->vessel_type = $data->data->vesselType ?? null;
            $order->classified = $data->data->classified ?? null;
            $order->built_year = $data->data->builtYear ?? null;
            $order->transhipment = isset($data->data->transhipment) ? ($data->data->transhipment == 'on' ? 'YES' : 'NO') : null;
            $order->coverage = $data->icc_selected ?? null;

            $order->deductibles =  null;
            $order->total_sum_insured =   $data->data->sumInsured ?? 0;  // ke 0
            $order->rate = $product->rate->{'icc_' . strtolower($data->icc_selected)}['premium_value'];  // ke 0.0
            $order->premium_amount = $data->premium_amount ?? 0;  // ke 0
            $order->premium_calculation =  $data->data->sumInsured . ' x ' . $product->rate->{'icc_' . strtolower($data->icc_selected)}['premium_value'] . ' = ' . $data->premium_amount;
            $order->premium_payment_warranty = '7 days After Sailling Date';
            $order->security = null;

            // return $order;
            $order->save();

            $transaction = new Transactions;
            $transaction->order_id = $order->id;
            $transaction->pn_number = 'PN-'.date('Ymd').'-'.$order->id;
            $transaction->policy_number = 'POL-'.date('Ymd').'-'.$order->id;
            $transaction->payment_total = $data->premium_amount; //???
            $transaction->payment_status = 'unpaid';
            $transaction->payment_method = !empty($request["payment_method"]) ? $request["payment_method"] : null;
            $transaction->start_policy_date = date('Y-m-d');
            $transaction->end_policy_date = date('Y-m-d', strtotime('+1 year'));
            $transaction->risk_status = $data->is_risk == 1 ? 'follow_up' : null;
            // return $transaction;
            $transaction->save();

            DB::commit();

            $link = "https://www.google.com";

            if (Auth::user()->account_type == 'retail') {
                return response()->json([
                    'message' => 'success',
                    'type' => 'retail',
                    'link' => $link
                ]);
            }else{
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
}
