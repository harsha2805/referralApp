<?php

namespace App\Services;

use App\Models\User;
use App\Models\Referrer;
use App\Mail\UserMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CoupenCode;

class GameService
{
    //save new user signup and process referrals
    public function processSignup($request)
    {
        try {
            //Save new user's signup
            $user = new User;
            $user->email = $request->email;
            $user->password = $request->password;

            $newReferralKey = Str::random(6);
            $user->referral_key = $newReferralKey;

            //set users initial start position
            $prevRegisteredUsersCount  = User::count();
            $user->start_position = (USER_DEFAULT_START_POS + $prevRegisteredUsersCount);
            $user->save();

            //update referrers
            if (!empty($request->referralKey)) {
                $referrer = User::whereReferralKey($request->referralKey)->first();
                //$user->referrer()->save($referrer);
                $refObj = new Referrer();
                $refObj->user_id = $referrer->id;
                $user->referrer()->save($refObj);

                //sends coupen code to the user
                //$this->sendCoupenCode($referrer);
            }

            return $newReferralKey;
            
        } catch (\Exception  $ex) {
            return false;
        }
    }

    public function currentPosition($userEmail)
    {
        $user = User::where('email', $userEmail)->first();
        if (!$user) {
            return false;
        }
        $position = User::where('id', '<', $user->id)->count();
        $referredUserCount = Referrer::where('user_id', $user->id)->count();
        $currentPosition = USER_DEFAULT_START_POS + $position - $referredUserCount;
        //dd(['currentPosition' => $currentPosition,'referredUserCount'=>$referredUserCount,'position'=>$position]);
        //For test we are using TEST_POS = 203
        //For original usage we can use FINAL_POS = 1
        if ($currentPosition === TEST_POS) {
            //if ($currentPosition === FINAL_POS){
            $this->sendCoupenCode($user);
            return $currentPosition;
        } else {
            return $currentPosition;
        }
    }


    public function calculateReferrersCount($user)
    {
        return Referrer::where('user_id', $user->id)->count();
    }

    public function sendCoupenCode($user)
    {
        $coupenCode = Str::random(6);
        $mailTo = Mail::to($user->email)->send(new CoupenCode(['coupenCode' => $coupenCode]));
    }
}
