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

class QuoteController extends Controller
{
    public function index() {
        $good = Repository::all();
        return view('Frontend.quote', compact('good'));
    }
    public function confirmation() {
        return view('Frontend.confirmation');
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

        // return $result;
        return view('Frontend.quote_calculate', compact('data','result'));
    }

    function calculatePrice($sumInsured, $rate, $additionalCostSum) {
        return $sumInsured + ($sumInsured * $rate)+$additionalCostSum;
    }
}
