@extends('layouts.frontend')

@section('content')
    <main>
        <!-- breadcrumb-area-start -->
    @section('page_img', asset('frontend/assets/img/bg/icons8-team-yTwXpLO5HAA-unsplash2.jpg'))
    @section('page_name', 'Register')
    @include('frontend.components.authbreadcrumb')
    <!-- breadcrumb-area-end -->

    <div class="skills-area pos-rel pt-130 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 pl-28">
                    <div class="skills-02-wrapper mb-30">
                        <form class="appiontment-form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="text-center center-align-content">
                                <h1 class="text-center">Register Form</h1>
                                <p class="login-intro mb-30">Create your new account. It's quick and easy!</p>

                                @if (session('status'))
                                    <div class="mb-4">
                                        <div class="col">
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        </div>

                                    </div>
                                @endif

                                <div class="col-lg-12 col-md-12">
                                    <div class="mb-20">
                                        <input type="text" name="name" placeholder="Full Name" value="{{ old('name')}}">
                                        @error('name')
                                            <p class="text-danger text-left">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="mb-20">
                                        <input type="email" name="email" placeholder="Email Address" value="{{ old('email')}}">
                                        @error('email')
                                            <p class="text-danger text-left">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="mb-20">
                                        <input type="password" name="password" placeholder="Password" value="{{ old('password')}}">
                                        @error('password')
                                            <p class="text-danger text-left">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="mb-20">
                                        <input type="password" name="password_confirmation"
                                            placeholder="Confirm Password" value="{{ old('password_confirmation')}}">
                                        @error('password_confirmation')
                                            <p class="text-danger text-left">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="mb-20">
                                        <button class="btn red-btn squre-btn" type="submit">Register <i
                                                class="far fa-paper-plane"></i></button>
                                    </div>
                                </div>
                                <p>If you are already member? <a style="color: brown"
                                        href="{{ route('user/login') }}">Signin Now</a></p>




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
