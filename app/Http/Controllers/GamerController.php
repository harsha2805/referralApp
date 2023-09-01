<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use App\Services\GameService;

class GamerController extends Controller
{
    public function signUp($referralKey = null){
        return view('signup.form',['referralKey' => $referralKey]);
    }

    public function processSignupForm(SignUpRequest $request, GameService $gameService)
    {
        $referralKey = $gameService->processSignup($request);
        if($referralKey){
            return ['referralUrl' => route("signup.referral", ['referralKey' => $referralKey])];
        }

       return ['error' => 'Oops! Some error occured...'];
    }
}