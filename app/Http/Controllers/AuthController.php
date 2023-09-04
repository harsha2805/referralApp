<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller{

    public function index(){
        return view('auth.login');
    } 

    public function processLogin(LoginRequest $request)    {

        $credentials = $request->only('email', 'password');
       
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if($user->isAdmin()){
                return ['redirect' => route("admin.dashboard")];
            }else{
                return ['redirect' => route("dashboard")];
            }
        }

        return ['error' => __('messages.generic_error')];
    }

    public function signOut(){
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }

}