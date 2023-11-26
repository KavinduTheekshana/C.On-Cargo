@extends('layouts.frontend')

@section('content')
    <main>
        <!-- breadcrumb-area-start -->
        @section('page_img', asset('frontend/assets/img/bg/bg-10.jpg'))
        @section('page_name', 'Dashboard')
        @include('frontend.components.authbreadcrumb')
        <!-- breadcrumb-area-end -->

        <div class="skills-area pos-rel pt-130 pb-100">
            <div class="container">
                <a class="dropdown-item" href="{{ route('logout') }}">
                    <i class="mdi mdi-logout me-2"></i>
                    <span class="align-middle">Log Out</span>
                </a>
            </div>
        </div>

        <!-- brand-area-end -->
    </main>
@endsection
