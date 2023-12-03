@extends('layouts.backend')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">


            <!-- Card Border Shadow -->
            <div class="row">
                @if (auth()->user() && auth()->user()->role == 0)
                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card card-border-shadow-primary h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2 pb-1">
                                <div class="avatar me-2">
                                    <span class="avatar-initial rounded bg-label-primary"><i
                                            class="menu-icon tf-icons mdi mdi-account-star"></i></span>
                                </div>
                                <h4 class="ms-1 mb-0 display-6">{{ $agents_count }}</h4>
                            </div>
                            <p class="mb-0 text-heading">Total Agents</p>
                            <p class="mb-0">
                                <small class="text-muted">Your Agents Count</small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card card-border-shadow-warning h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2 pb-1">
                                <div class="avatar me-2">
                                    <span class="avatar-initial rounded bg-label-warning">
                                        <i class="menu-icon tf-icons mdi mdi-book-account-outline"></i></span>
                                </div>
                                <h4 class="ms-1 mb-0 display-6">{{ $pending_bookings }}</h4>
                            </div>
                            <p class="mb-0 text-heading">Pending Bookings</p>
                            <p class="mb-0">

                                <small class="text-muted">Bookings you need to make Invoice</small>
                            </p>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card card-border-shadow-danger h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2 pb-1">
                                <div class="avatar me-2">
                                    <span class="avatar-initial rounded bg-label-danger">
                                        <i class="menu-icon tf-icons mdi mdi-account-multiple-outline"></i>
                                    </span>
                                </div>
                                <h4 class="ms-1 mb-0 display-6">{{ $customers_count }}</h4>
                            </div>
                            <p class="mb-0 text-heading">Total Customers</p>
                            <p class="mb-0">

                                <small class="text-muted">Your own customer list</small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                    <div class="card card-border-shadow-info h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2 pb-1">
                                <div class="avatar me-2">
                                    <span class="avatar-initial rounded bg-label-info"> <i
                                            class="menu-icon tf-icons mdi mdi-file-document-outline"></i></span>
                                </div>
                                <h4 class="ms-1 mb-0 display-6">{{ $invoice_count }}</h4>
                            </div>
                            <p class="mb-0 text-heading">Total Invoices</p>
                            <p class="mb-0">
                                <small class="text-muted">All of your invoice count</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Card Border Shadow -->
            <div class="row">
                <img width="120px" src="{{ asset('frontend/assets/img/logo/logo.svg') }}" alt=""
                    style="opacity: 0.2" />
            </div>
            <!--/ On route vehicles Table -->
        </div>
        <!-- / Content -->
    @endsection

    @push('pagejs')
        <script src="{{ asset('backend/assets/js/app-logistics-dashboard.js') }}"></script>
    @endpush
