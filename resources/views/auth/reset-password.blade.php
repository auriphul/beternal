@extends("frontend.layouts.layout")
@section("title","Login")
@section("content")

<div class="container-fluid bg-create h-110 forget-back">
<style>
    .error {
        color: #f33737;
        background-color: #ccc;
    }
</style>
    <div class="scroll-div">
        @if (Session::has('status'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('status') }}
                </div>
                <!-- <h1 style="color:red;">We have e-mailed your password reset link!</h1> -->
                {{-- return back()->with('message', 'We have e-mailed your password reset link!'); --}}
        @endif
        <form method="POST" action="{{ route('password.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="login forget-login">
                        <h4 class="mt-3 mb-5 forget-head">FORGET PASSWORD?</h4>
                        @if($errors->has('email'))
                                <h4 class="error">{{ $errors->first('email') }}</h4>
                        @endif
                        <p class="forget-para">Enter your Email Address to reset your password</p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend mail-bottom">
                                <span class="input-group-text mail-icon" id="basic-addon1"><i class="icon-mail"></i></span>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="forget-border-form" placeholder="Enter your Email" aria-label="Email" aria-describedby="basic-addon1"/>
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="icon-lock"></i></span>
                            </div>
                            <input type="password" id="password" type="password" name="password" required autocomplete="current-password" class="form-control survey-placeholder" placeholder="Password" aria-label="Password"  aria-describedby="basic-addon1" /> 
                            @if($errors->has('password'))
                                    <div class="error">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="icon-lock"></i></span>
                            </div>
                            <input type="password" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="current-password" class="form-control survey-placeholder" placeholder="Password" aria-label="Password"  aria-describedby="basic-addon1" /> 
                            @if($errors->has('password_confirmation'))
                                    <div class="error">{{ $errors->first('password_confirmation') }}</div>
                            @endif
                        </div>

                        <div  class="btn w-100 bg-black mb-5 m-auto text-center p-1 mt-1" >
                            <button type="submit" class="btn btn-primary" style="font-size:12px; background:black; border:10px; width:100%">
                                {{ __('CONTINUE') }}
                            </button>
                        </div>

                    </div>
                </div>
            </div>  
        </form>
    </div>
</div> 

@endsection
{{--<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
--}}