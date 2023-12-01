@extends('layouts.frontend')

@section('content')
    <main>
        <!-- breadcrumb-area-start -->
        @section('page_img', asset('frontend/assets/img/bg/corinne-kutz-tMI2_-r5Nfo-unsplash12.jpg'))
        @section('page_name', 'Contact Us')
        @include('frontend.components.breadcrumb')
        <!-- breadcrumb-area-end -->
        @include('frontend.contact.map')
        @include('frontend.contact.form')

        <!-- brand-area-start -->
        @include('frontend.components.brand')
        <!-- brand-area-end -->
    </main>
@endsection
