<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    function newClaim() {
        return view('Frontend.claim.new_claim');
    }
    function formClaim() {
        return view('Frontend.claim.form_claim');
    }
    function submittedClaim() {
        return view('Frontend.claim.submitted_claim');
    }
    function submittedDetail() {
        return view('Frontend.claim.detail_submitted');
    }
    function closedClaim() {
        return view('Frontend.claim.closed_claim');
    }
}
