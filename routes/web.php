<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamerController;

#Route::view('/{slug?}','form');
Route::get('/', [GamerController::class, 'signup'])->name('signup');
Route::get('/referral/{referralKey}', [GamerController::class, 'signup'])->name('signup.referral');
Route::post('/signup', [GamerController::class, 'processSignupForm'])->name('signup.submit');
Route::view('/thank-you', 'thank-you')->name('signup.thankyou');


/**Route::get('referral/{referral_key}', [GamerController::class, 'data'])
    ->middleware('VerifyReferralKey')
    ->name('referral.link');
**/
#Route::get('referral/{referral_key}', [ReferralController::class, 'show'])->name('referral.link');