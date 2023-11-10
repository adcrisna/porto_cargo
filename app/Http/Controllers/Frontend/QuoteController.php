<?php

namespace App\Http\Controllers\Frontend;

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

class QuoteController extends Controller
{
    public function index() {
        $good = Repository::all();
        return view('Frontend.quote', compact('good'));
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
