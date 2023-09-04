<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use App\Services\GameService;
use Illuminate\Support\Facades\Auth;

class GamerController extends Controller
{
    public function signUp($referralKey = null)
    {
        $user = Auth::user();
        if (!$user) {
            return view('signup.form', ['referralKey' => $referralKey]);
        } elseif ($user->isAdmin()) {
            return redirect()->route("admin.dashboard");
        } else {
            return redirect()->route("dashboard");
        }
    }

    public function processSignupForm(SignUpRequest $request, GameService $gameService)
    {
        $referralKey = $gameService->processSignup($request);
        $userEmail = $request->input('email');
        $currentUserPosition = $gameService->currentPosition($userEmail);
        //dd($referralKey);
        if ($referralKey) {
            //$userMail = $gameService->userMail($currentUserPosition);
            return [
                'referralUrl' => route("signup.referral", ['referralKey' => $referralKey]),
                'currentUserPosition' => $currentUserPosition,
                //'userMail' => $userMail
            ];
        }

        return redirect("login")->withSuccess(__('messages.login.access_denied'));
    }

    public function dashboard(GameService $gameService)
    {
        $user = Auth::user();
        if ($user) {
            //dd($user);
            $userEmail = $user->email;
            $currentUserPosition = $gameService->currentPosition($userEmail);

            $userReferralKey = $user->referral_key;
            $userReferralKeyUrl = route("signup.referral", ['referralKey' => $userReferralKey]);
            return view('dashboard', [
                'currentPosition' => $currentUserPosition,
                'userReferralKey' => $userReferralKeyUrl,
            ]);
        }
    }
}
