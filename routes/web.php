<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamerFormController;
use App\Http\Controllers\ReferralController;

Route::view('/{slug?}','form');

Route::post('/submit',[GamerFormController::class,'data']);

Route::get('/referral', [ReferralController::class,'index'])->name('referral.page');
