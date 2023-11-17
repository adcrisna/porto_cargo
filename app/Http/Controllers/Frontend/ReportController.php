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



class ReportController extends Controller
{
    public function index() {

        $order = Orders::where('user_id', Auth::user()->id);
        $data = $order->with('transaction')->whereHas('transaction', function ($query) {
            $query->where('payment_status', 'paid');
        })->get();
        $payment = $order->get();

        $claim = Claims::where('user_id', Auth::user()->id)->get();
        return view('Frontend.report', compact('data', 'payment', 'claim'));
    }


    function postClaim(Request $request) {
        return "REPORT DATA ON PROGRESS..";
    }


    function postShipment(Request $request) {
        return "REPORT DATA ON PROGRESS..";
    }


    function postPayment(Request $request) {
        return "REPORT DATA ON PROGRESS..";
    }
}
