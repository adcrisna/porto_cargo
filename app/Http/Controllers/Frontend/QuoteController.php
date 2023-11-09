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
}
