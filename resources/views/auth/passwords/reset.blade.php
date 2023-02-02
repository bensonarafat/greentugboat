

@extends('layouts.auth-app')
@section("title", "Reset Password - " . config("app.name"))
@section('auth-contents')
<div class="md:container md:mx-auto mt-5 mb-5 flex justify-center">
    <div class="flex-col flex">
        <div class="items-center flex jusitfy-center self-center">
            <img src="{{ asset("image/logos/logo.png") }}" alt="">
        </div>

        @include("layouts.alert")

        <form class="w-full max-w-lg border pb-4 pt-2 px-3 rounded mb-5" method="POST" action="{{ route("password.update") }}">

            <input type="hidden" name="token" value="{{ $token }}">

            @csrf
            <div class="text-center pb-4 pt-4">
                <h1 class="font-black text-[#1d8861] text-2xl uppercase">Reset Password </h1>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                    Email Address
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" name="email" type="Email address" placeholder="username@gmail.com" required autocomplete="email" autofocus {{ $email ?? old('email') }}>
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                    Password
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password" type="password" name="password" placeholder="******************" required>
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password-confirm">
                    Password
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password-confirm" type="password" name="password_confirmation" placeholder="******************" required>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6 pl-5 pr-5">
                <button type="submit" class="btn bg-[#1d8861] w-full  py-2.5"><strong class="uppercase text-white">Reset Password</strong></button>
            </div>


        </form>


        <div class="items-center flex jusitfy-center self-center">
            © {{ config("app.name") }} @php echo date("Y") @endphp all right receved
        </div>
    </div>
</div>
@endsection
