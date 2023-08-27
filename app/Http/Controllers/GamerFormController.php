<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\user;
use App\Http\Requests\FormDataRequest;


class GamerFormController extends Controller
{
    public function data(FormDataRequest $req)
    {
        $details = new user;
        $details->email = $req->email;
        $details->password = $req->password;
        $details->referal_key= $req->referal_key;
        $details->start_position= $req->start_position;
        $details->save();

        return redirect()->route('referral.page')->with('referral', 'Your code is ====!');
    }
}
