<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Frontend\QuoteController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ShipmentController;
use App\Http\Controllers\Frontend\ReportController;
use App\Http\Controllers\Frontend\ClaimController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Payment\ProcessedPaymentController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
    Route::get('/regeneratepn/{id}', 'regeneratepn')->name('regeneratepn');
    Route::get('/regeneratepolis/{id}', 'regeneratepolis')->name('regeneratepolis');
    Route::get('/policy_summary', 'pdfPolicySummary')->name('pdfPolicySummary');
    Route::get('/compensation_offer', 'compensationOffer')->name('compensationOffer');
    Route::get('/test', 'test')->name('test')->name('test');
    Route::get('/connect', 'connect')->name('connect')->name('connect');
    Route::get('/testt', 'testt')->name('testt');
});

Route::controller(ProcessedPaymentController::class)->group(function () {
    Route::post('/payment/callback', 'callback')->name('callback.payment');
    Route::get('/send/jobs/{id}', 'cargoSendJobs')->name('cargoSendJobs.payment');
});

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/cargo', 'cargo')->name('cargo');
    Route::get('/parcel', 'parcel')->name('parcel');
});

Route::controller(VerificationController::class)->group(function () {
    Route::get('/email/verify', 'verifiationNotice')->middleware(['auth'])->name('verification.notice');
    Route::post('/email/verification-notification', 'resend')->middleware(['auth', 'throttle:6,1'])->name('verification.send');
    Route::get('/verify-email/{id}/{hash}', 'verify')->name('verification.verify');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/postlogin', 'postlogin')->name('auth.postlogin');
    Route::get('/register', 'register')->name('auth.register');
    Route::post('/postregister', 'postregister')->name('auth.postregister');
    Route::get('/verification', 'waitVerif')->name('auth.verif');
    Route::get('/profile', 'profile')->name('auth.profile');
    Route::post('/update_profile', 'updateProfile')->name('auth.updateProfile');
    Route::get('/logout', 'logout')->name('auth.logout');
});


Route::group(['middleware' => ['auth', 'verified', 'verify_account']],function() {
    Route::controller(QuoteController::class)->group(function () {
        Route::get('/quote', 'index')->name('quote.index');
        Route::post('/confirmation', 'confirmation')->name('quote.confirmation');
        Route::prefix('process')->group(function () {
            Route::post('/calculation', 'calculation')->name('quote.calculation');
            Route::post('/saved', 'saved')->name('quote.saved');
            // Route::get('/saved', 'saved')->name('quote.saved');
         });

    });

    Route::controller(PaymentController::class)->group(function () {
        Route::get('/payment', 'index')->name('payment.index');
        Route::get('/payment_detail/{id}', 'detail')->name('payment.detail');
    });

    Route::controller(ShipmentController::class)->group(function () {
        Route::get('/shipment', 'index')->name('shipment.index');
    });

    Route::controller(ReportController::class)->group(function () {
        Route::get('/report', 'index')->name('report.index');
        Route::prefix('excel')->group(function () {
            Route::post('/claim', 'postClaim')->name('report.claim');
            Route::post('/shipment', 'postShipment')->name('report.shipment');
            Route::post('/payment', 'postPayment')->name('report.payment');
        });

    });

    Route::controller(ClaimController::class)->group(function () {
        Route::get('/new_claim', 'newClaim')->name('claim.new');
        Route::get('/form_claim/{id}', 'formClaim')->name('claim.form');
        Route::post('/form_claim', 'postClaim')->name('post.claim');
        Route::get('/submitted_claim', 'submittedClaim')->name('claim.submitted');
        Route::get('/submitted_detail/{id}', 'submittedDetail')->name('claim.detailSubmitted');
        Route::get('/closed_claim', 'closedClaim')->name('claim.closed');
    });
});
