@extends('layouts.frontend')

@section('content')
    <main>
        <!-- breadcrumb-area-start -->
        @section('page_img', asset('frontend/assets/img/bg/bg-10.jpg'))
        @section('page_name', 'Login')
        @include('frontend.components.authbreadcrumb')
        <!-- breadcrumb-area-end -->

        <div class="skills-area pos-rel pt-130 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 pl-28" data-animscroll="fade-right" data-animscroll-delay="100">
                        <div class="skills-02-wrapper mb-30">
                            <form class="appiontment-form" action="{{ route('regularuser') }}" method="POST">
                                @csrf
                                <div class="text-center center-align-content">
                                    <h1 class="text-center">Login Form</h1>
                                    <p class="login-intro mb-30">Welcome back! Please enter your details to continue.</p>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="mb-20">
                                            <input type="email" name="email" placeholder="Email Adsress">

                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="mb-20">
                                            <input type="password" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <a href="http://">Forgot your Passwords</a>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="mb-20">
                                            <button class="btn red-btn squre-btn" type="submit">Login <i class="far fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                    <p>Not a member? <a style="color: brown" href="{{ route('user/register') }}">Signup Now</a></p>




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
