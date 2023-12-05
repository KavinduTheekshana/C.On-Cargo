@extends('layouts.frontend')

@section('content')
    <main>
        <!-- breadcrumb-area-start -->
        @section('page_img', asset('frontend/assets/img/bg/smartwatch-futuristic-technology-woman-using-virtual-screen_53876-124639.webp'))
        @section('page_name', 'Trcking')
        @include('frontend.components.breadcrumb')
        <!-- breadcrumb-area-end -->
        @include('frontend.tracking.search')

        <!-- brand-area-start -->
        @include('frontend.components.brand')
        <!-- brand-area-end -->
    </main>
@endsection
