@extends('template')
@section('content')

<div class="user">
    <header class="user__header">
        <img src="{{ asset('images/logo.svg') }}" alt="" />
        <h1 class="user__title">{{__('messages.signup_msg')}}</h1>
    </header>

    <form id='signup' class="form auth-form" action="{{ route('signup.submit') }}" method="post">
        <div class="form__group">
            <input type="email" id='email' name='email' placeholder="Email" class="form__input" />
        </div>

        <div class="form__group">
            <input type="password" id='password' name='password' placeholder="Password" class="form__input" />
        </div>

        <button id="btnSignup" class="btn" type="button" onclick="return false;">Sign Up</button>
        <input type="hidden" id="referral_key" name="referral_key" value="{{ $referralKey }}">
        <a href="{{ route('login') }}" class="redirect-link">{{__('messages.login_link')}}</a>
        <div id="success-section" class="success">
            <p class="success-msg">{{ __('messages.success_msg') }}</p>
            <p id="referral-url" class="referral-url"></p><br>
            <p id="current-position" class="current-position"></p><br>
            <div class="share-button">
                <p>
                    <button class="button" data-sharer="facebook" data-hashtag="{{__('messages.share_msg')}}" data-url="referral_url_placeholder">Share on Facebook</button>
                    <button class="button" data-sharer="whatsapp" data-title="{{__('messages.share_msg')}}" data-url="referral_url_placeholder">Share on Whatsapp</button>
                    <button class="button" data-sharer="telegram" data-title="{{__('messages.share_msg')}}" data-url="referral_url_placeholder">Share on Telegram</button>
                    <button class="button" data-sharer="twitter" data-title="{{__('messages.share_msg')}}" data-hashtags="{{__('messages.share_msg')}}" data-url="referral_url_placeholderR">Share on Twitter</button>
                </p>
            </div>
        </div>
        <div id="error-section" class="errors">
            <p id="error-message" class="error-msg"></p>
        </div>
</div>