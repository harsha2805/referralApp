@extends('template')
@section('content')
<div id="success-section" class="info">
    <p class="success-msg">
        Your current position is: {{ $currentPosition }}
    </p>
    <p id="referral-url" class="referral-url">
        {{__('messages.share_link')}}
        <a href="{{ $userReferralKey }}"> {{ $userReferralKey }}</a>
    </p><br>
    <div class="share-button">
        <p>
            <button class="button" data-sharer="facebook" data-hashtag="{{__('messages.share_msg')}}" data-url="{{ $userReferralKey }}">Share on Facebook</button>
            <button class="button" data-sharer="whatsapp" data-title="{{__('messages.share_msg')}}" data-url="{{ $userReferralKey }}">Share on Whatsapp</button>
            <button class="button" data-sharer="telegram" data-title="{{__('messages.share_msg')}}" data-url="{{ $userReferralKey }}">Share on Telegram</button>
            <button class="button" data-sharer="twitter" data-title="{{__('messages.share_msg')}}" data-hashtags="{{__('messages.share_msg')}}" data-url="{{ $userReferralKey }}">Share on Twitter</button>
        </p>
    </div>
</div>
@endsection
