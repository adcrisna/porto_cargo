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

        $is_risk = false;

        if ($request->goodsType == 'other' || $this->builtYear($request->builtYear) >= 23) {
            $is_risk = true;
        }

        return view('Frontend.quote_calculate', compact('data','result','is_risk'));
    }

    function calculatePrice($sumInsured, $rate, $additionalCostSum) {
        return ceil($sumInsured + ($sumInsured * $rate)+$additionalCostSum);
    }

    function builtYear($builtYear) {
        $currentYear = Carbon::now()->year;
        $difference = $currentYear - (int)$builtYear;
        return $difference;
    }
}
