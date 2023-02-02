@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.auth-app')
@section("title", "Verify Your Email Address - " . config("app.name"))
@section('auth-contents')
<div class="md:container md:mx-auto mt-5 mb-5 flex justify-center">
    <div class="flex-col flex">
        <div class="items-center flex jusitfy-center self-center">
            <img src="{{ asset("image/logos/logo.png") }}" alt="">
        </div>

        @include("layouts.alert")

        <div class="w-full max-w-lg border pb-4 pt-2 px-3 rounded mb-5">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
            </form>
        </div>


        <div class="items-center flex jusitfy-center self-center">
            © {{ config("app.name") }} @php echo date("Y") @endphp all right receved
        </div>
    </div>
</div>
@endsection
