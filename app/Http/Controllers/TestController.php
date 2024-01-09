<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Auth,Str,Storage;
use App\Models\User;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Repository;
use App\Models\IccRate;
use App\Models\Transactions;
use App\Models\Claims;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifMailCargoRisk;


class TestController extends Controller
{
    function pdfPremiumNote()
    {
        $data= Transactions::find(4);
        $pdf = Pdf::loadView('pdf.premium_note', compact('data'));
        return $pdf->stream();
    }
    function pdfPolicySummary()
    {
        return 'halo dek';
        $data= Transactions::find(3);

        $pdf = Pdf::loadView('pdf.policy_summary',compact('data'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
    function compensationOffer()
    {
        $pdf = Pdf::loadView('pdf.compensation_offer');
        return $pdf->stream();
    }
    function test() {
        abort(404);
        // return view('emails.risk');
        $data = 1;

        Mail::to('alvanhan4@gmail.com')->send(new NotifMailCargoRisk($data));
        dd('Mail send successfully.');
    }

    function regeneratepn($id) {
        return abort(404); //komen jika ingin generate
        $data= Transactions::find($id);
        $pdf = Pdf::loadView('pdf.premium_note', compact('data'));
        $pdfFileName = 'premium_note_trx' . date('Ymd_His') . '.pdf';
        $pdfFilePath = 'doc_trx/' . $pdfFileName;
        Storage::disk('public')->put($pdfFilePath, $pdf->output());
        $data->doc_premium = asset('storage/' . $pdfFilePath);
        $data->save();
        return "regenerate pn masuk";
    }

    function regeneratepolis($id) {
        return abort(404);  //komen jika ingin generate
        $data= Transactions::find($id);
        $pdf = Pdf::loadView('pdf.policy_summary', compact('data'))->setPaper('a4', 'potrait');
        $pdfFileName = 'policy_summary_re' . date('Ymd_His') . '.pdf';
        $pdfFilePath = 'doc_trx/' . $pdfFileName;
        Storage::disk('public')->put($pdfFilePath, $pdf->output());
        $data->doc_policy = asset('storage/' . $pdfFilePath);
        $data->save();
        return "regenerate polis masuk";
    }

}
