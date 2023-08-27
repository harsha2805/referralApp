<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index(Request $request)
    {
        $referralMessage = $request->session()->get('referral');
        return view('referral', ['referralMessage' => $referralMessage]);
    }
}
