@extends('template')
@section('content')

<div class="user">
    <header class="user__header">
        <img src="{{ asset('images/logo.svg') }}" alt="" />
        <h1 class="user__title">Sign up to Gamer</h1>
    </header>
    
    <form class="form" action="{{ route('signup.submit') }}" method="post">
        <div class="form__group">
            <input type="email" id = 'email' name = 'email' placeholder="Email" class="form__input"/>
        </div>
        
        <div class="form__group">
            <input type="password" id='password' name='password' placeholder="Password" class="form__input"/>
        </div>
        
        <button id="signup" class="btn" type="button" onclick="return false;">Sign Up</button>
        <input type="hidden" id="referral_key" name="referral_key" value="{{ $referralKey }}">
    </form>

    <div id="success-section" class="success">
        <p class="success-msg">{{ __('messages.success_msg') }}</p>
        <p id = "referral-url" class="referral-url"></p>
    </div>

    <div id="error-section" class="errors">
        <p id="error-message" class="error-msg"></p>
    </div>
</div>
