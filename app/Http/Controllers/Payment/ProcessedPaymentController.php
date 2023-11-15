<?php

namespace App\Http\Controllers\Payment;

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
use Auth,Str;
use Xendit\Xendit;

class ProcessedPaymentController extends Controller
{
    function callback(Request $request ) {
        $data = $request->all();
        $parts = explode('_', $data['external_id']);
        $transaction = Transactions::find($parts[1]);
        $transaction->payment_status = strtolower($data['status']);
        $transaction->callback_status = $data;
        $transaction->payment_date = Carbon::parse($data['created'])->format('Y-m-d H:i:s');
        $transaction->save();
    }
}
