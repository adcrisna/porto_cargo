<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\QuoteController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ShipmentController;
use App\Http\Controllers\Frontend\ReportController;
use App\Http\Controllers\Frontend\ClaimController;
use App\Http\Controllers\TestController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::controller(TestController::class)->group(function () {
    Route::get('/premium_note', 'pdfPremiumNote')->name('pdfPremiumNote');
    Route::get('/policy_summary', 'pdfPolicySummary')->name('pdfPolicySummary');
    Route::get('/test', 'test')->name('test')->name('test');
});

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/cargo', 'cargo')->name('cargo');
    Route::get('/parcel', 'parcel')->name('parcel');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/postlogin', 'postlogin')->name('auth.postlogin');
    Route::get('/register', 'register')->name('auth.register');
    Route::post('/postregister', 'postregister')->name('auth.postregister');
    Route::get('/verification', 'waitVerif')->name('auth.verif');
    Route::get('/logout', 'logout')->name('auth.logout');
});

Route::group(['middleware' => ['auth','verify_account']],function() {
    Route::controller(QuoteController::class)->group(function () {
        Route::get('/quote', 'index')->name('quote.index');
        Route::post('/confirmation', 'confirmation')->name('quote.confirmation');
        Route::prefix('process')->group(function () {
            Route::post('/calculation', 'calculation')->name('quote.calculation');
            Route::post('/saved', 'saved')->name('quote.saved');
         });

    });

    Route::controller(PaymentController::class)->group(function () {
        Route::get('/payment', 'index')->name('payment.index');
    });

    Route::controller(ShipmentController::class)->group(function () {
        Route::get('/shipment', 'index')->name('shipment.index');
    });

    Route::controller(ReportController::class)->group(function () {
        Route::get('/report', 'index')->name('report.index');
    });

    Route::controller(ClaimController::class)->group(function () {
        Route::get('/new_claim', 'newClaim')->name('claim.new');
        Route::get('/form_claim/{id}', 'formClaim')->name('claim.form');
        Route::post('/form_claim', 'postClaim')->name('post.claim');
        Route::get('/submitted_claim', 'submittedClaim')->name('claim.submitted');
        Route::get('/submitted_detail', 'submittedDetail')->name('claim.detailSubmitted');
        Route::get('/closed_claim', 'closedClaim')->name('claim.closed');
    });
});
