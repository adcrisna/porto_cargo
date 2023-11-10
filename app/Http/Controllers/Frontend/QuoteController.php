<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index() {
        return view('Frontend.quote');
    }
    public function confirmation() {
        return view('Frontend.confirmation');
    }

    function calculation(Request $request) {
        if ( empty($request->all()) ) {
            return "asd";
        }
        $data = $request->all();
        return view('Frontend.quote_calculate', compact('data'));
    }
}
