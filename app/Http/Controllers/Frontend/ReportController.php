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
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ShipmentReport;
use App\Exports\PaymentReport;
use App\Exports\ClaimReport;



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
        return Excel::download(new ClaimReport($request->tanggalAwal, $request->tanggalAkhir), 'report_claim.xlsx');
    }

    function postShipment(Request $request) {
        return Excel::download(new ShipmentReport($request->tanggalAwal, $request->tanggalAkhir), 'report_shipment.xlsx');
    }

    function postPayment(Request $request) {
        return Excel::download(new PaymentReport($request->tanggalAwal, $request->tanggalAkhir), 'report_payment.xlsx');
    }
}
