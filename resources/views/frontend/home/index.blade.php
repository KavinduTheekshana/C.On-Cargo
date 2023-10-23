@extends('layouts.frontend')

@section('content')
    <main>

        <!-- slider-start -->
        @include('frontend.home.slider')
        <!-- slider-start -->

        <!-- features-area-start -->
        {{-- @include('frontend.home.features') --}}
        <!-- features-area-end -->

        <!-- about-us-area-start -->
        @include('frontend.home.about')
        <!-- about-us-area-end -->

        <!-- cta-area-start -->
        @include('frontend.home.support')
        <!-- cta-area-end -->

    

        <!-- services-area-start -->
        @include('frontend.home.services')
        <!-- services-area-end -->

        <!-- appiontment-area-start -->
        @include('frontend.home.quote')
        <!-- appiontment-area-end -->

        <!-- testimonial-area-start -->
        @include('frontend.home.testimonial')
        <!-- testimonial-area-end -->

        <!-- features-02-area-start -->
        @include('frontend.home.whatwedo')
        <!-- features-02-area-end -->

        <!-- skills-area-start -->
        {{-- @include('frontend.home.skill') --}}
        <!-- skills-area-end -->


        @include('frontend.home.faq')
       
            <!-- newsletters-area-start -->
            @include('frontend.home.newsletter')
            <!-- newsletters-area-end -->



        <!-- blog-area-start -->
        {{-- @include('frontend.home.blog') --}}
        <!-- blog-area-end -->

        <!-- brand-area-start -->
        @include('frontend.components.brand')
        <!-- brand-area-end -->
    </main>
@endsection
