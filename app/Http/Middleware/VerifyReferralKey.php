<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class VerifyReferralKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $referralKey = $request->route('referral_key');

        //validate referrral key's integrity
        if (!empty($referralKey)) {
            $user = User::where('referral_key', $referralKey)->first();

            if (!$user) {
                return abort(403, 'Invalid referral key');
            }

            $request->merge(['referral_user' => $user]);
        }

        return $next($request);
    }
}