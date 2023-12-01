@extends('layouts.frontend')

@section('content')
    <main>
        <!-- breadcrumb-area-start -->
        @section('page_img', asset('frontend/assets/img/bg/javygo-ZdySMOIicMo-unsplash13.jpg'))
        @section('page_name', 'Services')
        @include('frontend.components.breadcrumb')
        <!-- breadcrumb-area-end -->



   <!-- skills-area-start -->
   @include('frontend.services.explore')
<!-- skills-area-end -->

<!-- section-area-start -->
@include('frontend.services.services')
<!-- services-area-end -->




@include('frontend.services.working')



@include('frontend.services.cta')




        <!-- brand-area-start -->
        @include('frontend.components.brand')
        <!-- brand-area-end -->
    </main>
@endsection
