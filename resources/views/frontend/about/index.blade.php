@extends('layouts.frontend')

@section('content')
    <main>
        <!-- breadcrumb-area-start -->
        @section('page_img', asset('frontend/assets/img/bg/icons8-team-yTwXpLO5HAA-unsplash2.jpg'))
        @section('page_name', 'About Us')
        @include('frontend.components.breadcrumb')
        <!-- breadcrumb-area-end -->


            <!-- about-me-area-start -->
            @include('frontend.about.about')
            <!-- about-me-area-end -->



            <!-- video-area-start -->
            @include('frontend.about.video')
            <!-- video-area-end -->

            <!-- testimonial-area-start -->
            @include('frontend.about.testimonial')
            <!-- testimonial-area-end -->


        <!-- brand-area-start -->
        @include('frontend.components.brand')
        <!-- brand-area-end -->
    </main>
@endsection
