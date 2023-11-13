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


class PaymentController extends Controller
{
    public function index() {

        $order = Orders::where('user_id', Auth::user()->id);
        $data = $order->get();
        // if (Auth::user()->account_type === 'verify') {
        // } else {
        //     $data = $order->get();
        // }
        return view('Frontend.payment' , compact('data'));
    }
}
