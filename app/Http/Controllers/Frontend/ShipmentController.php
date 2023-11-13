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
            $data = $order->get();
        } else {
            $data = $order->where('payment_status', 'paid')->get();
        }
        // return $data;
        return view('Frontend.shipment' , compact('data'));
    }
}
