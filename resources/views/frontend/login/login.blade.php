@extends('layouts.frontend')

@section('content')
    <main>
        <!-- breadcrumb-area-start -->
    @section('page_img', asset('frontend/assets/img/bg/icons8-team-yTwXpLO5HAA-unsplash2.jpg'))
    @section('page_name', 'Login')
    @include('frontend.components.authbreadcrumb')
    <!-- breadcrumb-area-end -->

    <div class="skills-area pos-rel pt-130 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 p-2">
                    <h4>Are you still not a member of C-ON Cargo?</h4>
                    <p>Just a few quick things to get started</p>
                    <div class="col-lg-12 col-md-12 mt-20-btn p-2">
                        <div class="mb-20">
                            <a href="{{ route('user/register') }}" class=" btn dark-btn-custom squre-btn" type="button">Register
                                <i class="far fa-paper-plane"></i></a>
                        </div>
                    </div>
                    <hr>
                    <div class="skills-02-wrapper mb-30">
                        <form class="appiontment-form" action="{{ route('regularuser') }}" method="POST">
                            @csrf
                            <div class="text-center center-align-content">
                                <h1 class="text-center">Login</h1>
                                <p class="login-intro mb-30">Welcome back! Please enter your details to continue.</p>

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
                                        <input type="email" name="email" placeholder="Email Address" value="{{ old('email')}}">
                                        @error('email')
                                            <p class="text-danger text-left">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="mb-2">
                                        <input type="password" name="password" placeholder="Password" value="{{ old('password')}}">
                                        @error('password')
                                            <p class="text-danger text-left">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 text-left">
                                    <a class="" href="{{ route('user/forgot-password') }}">Forgotten your
                                        password?</a>
                                </div>
                                <div class="col-lg-12 col-md-12 mt-20-btn">
                                    <div class="mb-20">
                                        <button class="btn red-btn squre-btn" type="submit">Login <i
                                                class="far fa-paper-plane"></i></button>
                                    </div>
                                </div>
                                <p>Not a member? <a class="text-dark" href="{{ route('user/register') }}">Register
                                        Now</a></p>




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
