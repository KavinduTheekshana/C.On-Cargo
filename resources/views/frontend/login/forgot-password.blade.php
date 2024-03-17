@extends('layouts.frontend')

@section('content')
    <main>
        <!-- breadcrumb-area-start -->
        @section('page_img', asset('frontend/assets/img/bg/icons8-team-yTwXpLO5HAA-unsplash2.jpg'))
    @section('page_name', 'Forgot Password')
    @include('frontend.components.authbreadcrumb')
    <!-- breadcrumb-area-end -->

    <div class="skills-area pos-rel pt-130 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 pl-28" data-animscroll="fade-right"
                    data-animscroll-delay="100">
                    <div class="skills-02-wrapper mb-30">
                        <form class="appiontment-form" action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <div class="text-center center-align-content">
                                <h1 class="text-center">Forgot Password</h1>
                                <p class="login-intro mb-30">Forgot your password? No problem. Just let us know your
                                    email address and we will email you a password reset link that will allow you to
                                    choose a new one.</p>


                                <div class="col-lg-12 col-md-12">
                                    <div class="mb-20">


                                        <input type="email" name="email" placeholder="Email Address">
                                        @error('email')
                                            <p class="text-danger text-left">{{ $message }}</p>
                                        @enderror
                                        @if (session('status'))
                                        <div class="mb-4">
                                            <p class="text-success text-left">{{ session('status') }}</p>

                                        </div>
                                    @endif
                                    </div>
                                </div>


                            </div>
                            <div class="col-lg-12 col-md-12 mt-20-btn">
                                <div class="mb-20">
                                    <button class="btn red-btn squre-btn" type="submit">Email Password Reset Link <i
                                            class="far fa-paper-plane"></i></button>
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
