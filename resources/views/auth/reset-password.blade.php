{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('layouts.frontend')

@section('content')
    <main>
        <!-- breadcrumb-area-start -->
    @section('page_img', asset('frontend/assets/img/bg/bg-10.jpg'))
    @section('page_name', 'Reset Password')
    @include('frontend.components.authbreadcrumb')
    <!-- breadcrumb-area-end -->

    <div class="skills-area pos-rel pt-130 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 pl-28" data-animscroll="fade-right"
                    data-animscroll-delay="100">
                    <div class="skills-02-wrapper mb-30">
                        <form class="appiontment-form" action="{{ route('password.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="text-center center-align-content">
                                <h1 class="text-center">Change Your Password</h1>
                                <p class="login-intro mb-30">Enter a new password below to change your password</p>


                                <div class="col-lg-12 col-md-12">
                                    <div class="mb-20">
                                        <input type="email" name="email" placeholder="Email Adsress" value="{{old('email', $request->email)}}" readonly>
                                        @error('email')
                                            <p class="text-danger text-left">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-20">
                                        <input type="password" name="password" placeholder="New Password" autofocus required>
                                        {{-- @error('email')
                                            <p class="text-danger text-left">{{ $password }}</p>
                                        @enderror --}}
                                    </div>

                                    <div class="mb-20">
                                        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                                    </div>
                                </div>


                            </div>
                            <div class="col-lg-12 col-md-12 mt-20-btn">
                                <div class="mb-20">
                                    <button class="btn red-btn squre-btn" type="submit">Reset Password</button>
                                </div>
                            </div>






                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- brand-area-end -->
</main>
@endsection

