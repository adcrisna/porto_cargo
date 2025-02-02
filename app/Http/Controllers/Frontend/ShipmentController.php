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


class ShipmentController extends Controller
{
    public function index() {
        $order = Orders::where('user_id', Auth::user()->id);

        if (Auth::user()->account_type === 'verify') {
            $data = $order->with('transaction')->whereHas('transaction', function ($query) {
                $query->where('is_risk', '!=', '1');
            })->get();
        } else {
            $data = $order->with('transaction')->whereHas('transaction', function ($query) {
                $query->where('payment_status', 'paid')
                ->where('is_risk', '!=', '1');
            })->get();
        }
        return view('Frontend.shipment' , compact('data'));
    }
}
