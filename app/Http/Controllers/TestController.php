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

class TestController extends Controller
{
    function pdfPremiumNote()
    {
        $pdf = Pdf::loadView('pdf.premium_note');
        return $pdf->stream();
    }
    function pdfPolicySummary()
    {
        $data= Transactions::find(1);

        $pdf = Pdf::loadView('pdf.policy_summary',compact('data'));
        return $pdf->stream();
    }
    function compensationOffer()
    {
        $pdf = Pdf::loadView('pdf.compensation_offer');
        return $pdf->stream();
    }
    function test() {
        $trx_id = 12345;
        $external_id = Str::random(10) . '_' . $trx_id;
        $parts = explode('_', $external_id);
        return $parts[1];

    }

}
