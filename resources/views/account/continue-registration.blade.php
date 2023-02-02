@extends('layouts.auth-app')
@section("title", "Continue Registration - " . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section('auth-contents')

<div class="md:container md:mx-auto mt-5 mb-5 flex justify-center">
    <div class="flex-col flex">
        <div class="items-center flex jusitfy-center self-center">
            <img src="{{ asset("image/logos/logo.png") }}" alt="">
        </div>


        @include("layouts.alert")
        @if(Session::has("step"))
            @if(Session::get("step") == "one")
                @include("account.continue.step-one")
            @elseif(Session::get("step") == "two")
                @include("account.continue.step-two")
            @elseif(Session::get("step") == "company")
                @include("account.continue.step-company")
            @elseif(Session::get("step") == "bank-step")
                @include("account.continue.step-bank")
            @elseif(Session::get("step") == "complete")
                @include("account.continue.step-complete")
            @endif
        @else
            @include("account.continue.step-one")
        @endif
        <div class="items-center flex jusitfy-center self-center" style="padding-left: 5px; padding-right:5px;">
            © {{ config("app.name") }} @php echo date("Y") @endphp all right receved
        </div>
    </div>
</div>
@endsection
