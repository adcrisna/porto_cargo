<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use DB,Str;
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
        $data= Transactions::find(1);
        $pdf = Pdf::loadView('pdf.premium_note', compact('data'));
        return $pdf->stream();
    }
    function pdfPolicySummary()
    {
        $data= Transactions::find(3);

        $pdf = Pdf::loadView('pdf.policy_summary',compact('data'));
        return $pdf->stream();
    }
    function compensationOffer()
    {
        $pdf = Pdf::loadView('pdf.compensation_offer');
        return $pdf->stream();
    }
    function test() {
        $data = 1;

        Mail::to('alvanhan4@gmail.com')->send(new NotifMailCargoRisk($data));
        dd('Mail send successfully.');
    }

}
