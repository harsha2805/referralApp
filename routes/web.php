<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', [GamerController::class, 'signup'])->name('signup');
Route::get('/referral/{referralKey}', [GamerController::class, 'signup'])
    ->name('signup.referral')
    ->middleware('verify.referral');
Route::post('/signup', [GamerController::class, 'processSignupForm'])->name('signup.submit');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'processLogin'])->name('login.submit');
Route::get('logout', [AuthController::class, 'signOut'])->name('login.signout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/dashboard', [GamerController::class, 'dashboard'])->name('dashboard');
    //Route::get('/referral/{referralKey}', [GamerController::class, 'displayReferralKey'])->name('display_referralKey');
    Route::post('/user/delete', [AdminController::class, 'deleteUser'])->name('user.delete');;
});
