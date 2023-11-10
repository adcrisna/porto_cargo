<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use DB;
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
        $pdf = Pdf::loadView('pdf.policy_summary');
        return $pdf->stream();
    }

    function test() {
        $data =  User::find(1);
        return $data;
    }
}
