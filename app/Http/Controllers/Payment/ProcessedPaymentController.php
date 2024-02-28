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
use Auth,Str,Storage;
use Xendit\Xendit;
use Barryvdh\DomPDF\Facade\Pdf;
use Log;
use App\Jobs\MomenticConnection;


class ProcessedPaymentController extends Controller
{
    function callback(Request $request) {
        $data = $request->all();
        $parts = explode('_', $data['external_id']);
        $transaction = Transactions::find($parts[1]);
        $transaction->payment_status = strtolower($data['status']);
        $transaction->callback_status = $data;
        $transaction->payment_date = Carbon::parse($data['created'])->format('Y-m-d H:i:s');
        $transaction->doc_policy = $this->psummary($transaction);
        $transaction->doc_premium = $this->pnote($transaction);
        $transaction->save();

        if ($data['status'] == 'PAID') {
            MomenticConnection::dispatch($transaction->order->id);
            Log::alert("SEND MOMENTIC CONNECTION_FROM_XENDIT_ORDER_ID ".$transaction->order->id);
        }
    }


    function cargoSendJobs($id) {
        $order = Orders::find($id);
        if(!empty($order->contract_id)) 
        {
            return response()->json(['status' => 'false'],200);
        }else {
            Log::alert("LOG FROM DASHBOARD PARTERS CARGO ORDER ID ".$id);
            MomenticConnection::dispatch($id);
            return response()->json(['status' => 'success'],200);
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
}
