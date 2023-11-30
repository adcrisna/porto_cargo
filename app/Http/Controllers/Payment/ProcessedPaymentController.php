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


class ProcessedPaymentController extends Controller
{
    function callback(Request $request ) {
        $data = $request->all();
        $parts = explode('_', $data['external_id']);
        $transaction = Transactions::find($parts[1]);
        $transaction->payment_status = strtolower($data['status']);
        $transaction->callback_status = $data;
        $transaction->payment_date = Carbon::parse($data['created'])->format('Y-m-d H:i:s');
        $transaction->doc_policy = $this->psummary($transaction);
        $transaction->doc_premium = $this->pnote($transaction);
        $transaction->save();
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
    public function pnote($transaction)
    {
        $pdf = Pdf::loadView('pdf.premium_note');
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
    public function psummary($transaction)
    {
        $pdf = Pdf::loadView('pdf.policy_summary');
        $pdfFileName = 'policy_summary_' . date('Ymd_His') . '.pdf';
        $pdfFilePath = 'doc_trx/' . $pdfFileName;
        Storage::disk('public')->put($pdfFilePath, $pdf->output());
        return asset('storage/' . $pdfFilePath);
    }
}
