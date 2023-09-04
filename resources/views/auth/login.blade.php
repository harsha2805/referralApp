@extends('template')
@section('content')

<div class="user">
    <header class="user__header">
        <img src="{{ asset('images/logo.svg') }}" alt="" />
        <h1 class="user__title">{{ __('messages.login.section_title') }} </h1>
    </header>
    
    <form id='login' class="form auth-form" action="{{ route('login.submit') }}" method="post" >
        <div class="form__group">
            <input type="email" id = 'email' name = 'email' placeholder="Email" class="form__input"/>
        </div>
        
        <div class="form__group">
            <input type="password" id='password' name='password' placeholder="Password" class="form__input"/>
        </div>
        
        <button id="btnLogin" class="btn" type="button">{{ __('messages.login.button_text') }}</button>
        <a href="{{ route('signup') }}" class="redirect-link">{{__('messages.signup_link')}}</a>
    </form>
</div>
@endsection