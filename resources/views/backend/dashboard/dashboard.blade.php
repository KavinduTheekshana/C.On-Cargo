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

            <div class="row">
                <!-- Vehicles overview -->

                <!--/ Vehicles overview -->
                <!-- Shipment statistics-->
                <div class="col-lg-6 col-xxl-6 mb-4 order-3 order-xxl-1">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="card-title mb-0">
                                <h5 class="m-0 me-2 mb-1">Bookings statistics</h5>
                            </div>

                        </div>
                        <div class="card-body">
                            <canvas id="bookingStat" height="300"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xxl-3 mb-4 order-1 order-xxl-3">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="card-title mb-0">
                                <h5 class="m-0 me-2 mb-1">Customer statistics</h5>
                            </div>

                        </div>
                        <div class="card-body">
                            <canvas id="doughnutChart" height="300"></canvas>
                            <br>
                            <ul class="doughnut-legend d-flex justify-content-around ps-0 mb-2 pt-1">

                                <li class="ct-series-1 d-flex flex-column">
                                    <h5 class="mb-0">Active</h5>
                                    <span class="badge badge-dot my-2 cursor-pointer rounded-pill"
                                        style="background-color: rgb(40, 208, 148); width: 35px; height: 6px"></span>
                                    <div class="text-muted">{{ number_format($activePercentage, 2) }}%</div>
                                </li>
                                <li class="ct-series-2 d-flex flex-column">
                                    <h5 class="mb-0">Inactive</h5>
                                    <span class="badge badge-dot my-2 cursor-pointer rounded-pill"
                                        style="background-color: #fdac34; width: 35px; height: 6px"></span>
                                    <div class="text-muted">{{ number_format($inactivePercentage, 2) }}%</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xxl-3 mb-4 order-1 order-xxl-3">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="card-title mb-0">
                                <h5 class="m-0 me-2 mb-1">Completed & Pending Bookings</h5>
                            </div>

                        </div>
                        <div class="card-body">
                            <canvas id="doughnutChartBookings" height="300"></canvas>
                            <br>
                            <ul class="doughnut-legend d-flex justify-content-around ps-0 mb-2 pt-1">

                                <li class="ct-series-1 d-flex flex-column">
                                    <h5 class="mb-0">Completed</h5>
                                    <span class="badge badge-dot my-2 cursor-pointer rounded-pill"
                                        style="background-color: #836AF9; width: 35px; height: 6px"></span>
                                    <div class="text-muted">{{ number_format($activeBookingPercentage, 2) }}%</div>
                                </li>
                                <li class="ct-series-2 d-flex flex-column">
                                    <h5 class="mb-0">Pending</h5>
                                    <span class="badge badge-dot my-2 cursor-pointer rounded-pill"
                                        style="background-color: #FF8132; width: 35px; height: 6px"></span>
                                    <div class="text-muted">{{ number_format($pendingBookingPercentage, 2) }}%</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/ Shipment statistics -->

            </div>


            <!--/ Card Border Shadow -->
            {{-- <div class="row">
                <img width="120px" src="{{ asset('frontend/assets/img/logo/logo.svg') }}" alt=""
                    style="opacity: 0.2" />
            </div> --}}
            <!--/ On route vehicles Table -->
        </div>
        <!-- / Content -->
    @endsection

    @push('pagejs')
        <script src="{{ asset('backend/assets/js/app-logistics-dashboard.js') }}"></script>

        {{-- <script src="{{ asset('backend/assets/js/charts-chartjs.js') }}"></script> --}}

        <script>
            'use strict';

            (function() {
                // Color Variables
                const purpleColor = '#836AF9',
                    yellowColor = '#ffe800',
                    cyanColor = '#28dac6',
                    orangeColor = '#FF8132',
                    orangeLightColor = '#ffcf5c',
                    oceanBlueColor = '#299AFF',
                    greyColor = '#4F5D70',
                    greyLightColor = '#EDF1F4',
                    blueColor = '#2B9AFF',
                    blueLightColor = '#84D0FF';

                let cardColor, headingColor, labelColor, borderColor, legendColor;

                if (isDarkStyle) {
                    cardColor = config.colors_dark.cardColor;
                    headingColor = config.colors_dark.headingColor;
                    labelColor = config.colors_dark.textMuted;
                    legendColor = config.colors_dark.bodyColor;
                    borderColor = config.colors_dark.borderColor;
                } else {
                    cardColor = config.colors.cardColor;
                    headingColor = config.colors.headingColor;
                    labelColor = config.colors.textMuted;
                    legendColor = config.colors.bodyColor;
                    borderColor = config.colors.borderColor;
                }

                // Set height according to their data-height
                // --------------------------------------------------------------------
                const chartList = document.querySelectorAll('.chartjs');
                chartList.forEach(function(chartListItem) {
                    chartListItem.height = chartListItem.dataset.height;
                });

                // Bar Chart
                // --------------------------------------------------------------------
                const barChart = document.getElementById('bookingStat');
                if (barChart) {
                    const barChartVar = new Chart(barChart, {
                        type: 'bar',
                        data: {
                            labels: {!! json_encode($labels) !!},
                            datasets: [{
                                label: 'Total Bookings',
                                data: {!! json_encode($totals) !!},
                                backgroundColor: orangeLightColor,
                                borderColor: 'transparent',
                                maxBarThickness: 100,
                                borderRadius: {
                                    topRight: 15,
                                    topLeft: 15
                                }
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            animation: {
                                duration: 500
                            },
                            plugins: {
                                tooltip: {
                                    rtl: isRtl,
                                    backgroundColor: cardColor,
                                    titleColor: headingColor,
                                    bodyColor: legendColor,
                                    borderWidth: 1,
                                    borderColor: borderColor
                                },
                                legend: {
                                    display: false
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }
                // Doughnut Chart
                // --------------------------------------------------------------------

                const doughnutChart = document.getElementById('doughnutChart');
                if (doughnutChart) {
                    const doughnutChartVar = new Chart(doughnutChart, {
                        type: 'doughnut',
                        data: {
                            labels: ['Active', 'Inactive'],
                            datasets: [{
                                data: [{{ $activeCustomersCount }}, {{ $inactiveCustomersCount }}],
                                backgroundColor: [cyanColor, orangeLightColor],
                                borderWidth: 0,
                                pointStyle: 'rectRounded'
                            }]
                        },
                        options: {
                            responsive: true,
                            animation: {
                                duration: 500
                            },
                            cutout: '68%',
                            plugins: {
                                legend: {
                                    display: false
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            const label = context.label || '';
                                            const value = context.parsed || 0;
                                            const dataset = context.dataset;
                                            const total = dataset.data.reduce((acc, curr) => acc + curr, 0);
                                            const percentage = ((value / total) * 100).toFixed(2);
                                            return `${label}: ${percentage}%`;
                                        }
                                    },
                                    // Updated default tooltip UI
                                    rtl: isRtl,
                                    backgroundColor: cardColor,
                                    titleColor: headingColor,
                                    bodyColor: legendColor,
                                    borderWidth: 1,
                                    borderColor: borderColor
                                }
                            }
                        }
                    });
                }

                //Booking Active chart
                const doughnutChartBookings = document.getElementById('doughnutChartBookings');
                if (doughnutChartBookings) {
                    const doughnutChartVarBookings = new Chart(doughnutChartBookings, {
                        type: 'doughnut',
                        data: {
                            labels: ['Active', 'Inactive'],
                            datasets: [{
                                data: [{{ $totalActiveBookings }}, {{ $totalPendingBookings }}],
                                backgroundColor: [purpleColor, orangeColor],
                                borderWidth: 0,
                                pointStyle: 'rectRounded'
                            }]
                        },
                        options: {
                            responsive: true,
                            animation: {
                                duration: 500
                            },
                            cutout: '68%',
                            plugins: {
                                legend: {
                                    display: false
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            const label = context.label || '';
                                            const value = context.parsed || 0;
                                            const dataset = context.dataset;
                                            const total = dataset.data.reduce((acc, curr) => acc + curr, 0);
                                            const percentage = ((value / total) * 100).toFixed(2);
                                            return `${label}: ${percentage}%`;
                                        }
                                    },
                                    // Updated default tooltip UI
                                    rtl: isRtl,
                                    backgroundColor: cardColor,
                                    titleColor: headingColor,
                                    bodyColor: legendColor,
                                    borderWidth: 1,
                                    borderColor: borderColor
                                }
                            }
                        }
                    });
                }
            })();
        </script>
    @endpush
