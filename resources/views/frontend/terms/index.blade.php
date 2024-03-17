@extends('layouts.frontend')

@section('content')
    <main>
        <!-- breadcrumb-area-start -->
        @section('page_img', asset('frontend/assets/img/bg/terms.webp'))
        @section('page_name', 'Terms')
        @include('frontend.components.breadcrumb')
        <!-- breadcrumb-area-end -->
        @include('frontend.terms.terms')
    </main>
@endsection
