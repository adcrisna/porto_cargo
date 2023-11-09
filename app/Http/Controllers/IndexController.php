<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return view('index');
    }
    public function contact() {
        return view('frontend.contact');
    }
    public function cargo() {
        return view('cargo_cover');
    }
    public function parcel() {
        return view('parcel_cover');
    }
}
