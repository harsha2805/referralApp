<?php
namespace App\Services;

use App\Models\User;
use App\Models\Referrer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GameService{

    //save new user signup and process referrals
    public function processSignup($request){

        try{

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
            if(!empty($request->referralKey)){
                $referrer = User::whereReferralKey($request->referralKey)->first();
                //$user->referrer()->save($referrer);
                $refObj = new Referrer();
                $refObj->user_id = $referrer->id;
                $user->referrer()->save($refObj);
            }
            
            return $newReferralKey;
 
        }catch(\Exception  $ex){
            return false;
        }
        
    }

    
    
}
?>