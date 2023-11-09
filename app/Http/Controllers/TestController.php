<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TestController extends Controller
{
    function pdfPremiumNote()
    {
        $pdf = Pdf::loadView('pdf.premium_note');
        return $pdf->stream();
    }
}
