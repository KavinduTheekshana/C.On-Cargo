@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/pages/page-profile.css') }}" />
@endpush
@extends('layouts.backend')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">User Profile /</span> Profile</h4>

        <!-- Header -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="user-profile-header-banner">
                        <img src="{{ asset('backend/assets/img/pages/profile-banner.png') }}" alt="Banner image"
                            class="rounded-top" />
                    </div>
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                            <img src="{{ asset('backend/assets/img/avatars/1.png') }}" alt="user image"
                                class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" />
                        </div>
                        <div class="flex-grow-1 mt-3 mt-sm-5">
                            <div
                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <ul
                                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                        <li class="list-inline-item">
                                            <i class="mdi mdi-calendar-blank-outline me-1 mdi-20px"></i><span
                                                class="fw-medium"> Joined
                                                {{ Auth::user()->created_at->format('M Y') }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Header -->



        <!-- User Profile Content -->
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5">
                <!-- About User -->
                <div class="card mb-4">
                    <div class="card-body">
                        <small class="card-text text-uppercase">About</small>
                        <ul class="list-unstyled my-3 py-1">
                            <li class="d-flex align-items-center mb-3">
                                <i class="mdi mdi-account-outline mdi-24px"></i><span class="fw-medium mx-2">Full
                                    Name:</span> <span>{{ Auth::user()->name }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="mdi mdi-check mdi-24px"></i><span class="fw-medium mx-2">Status:</span>
                                <span>@auth
                                        @if (auth()->user()->status == 0)
                                            Deactivated
                                        @elseif(auth()->user()->status == 1)
                                            Active
                                        @endif
                                    @endauth
                                </span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="mdi mdi-star-outline mdi-24px"></i><span class="fw-medium mx-2">Role:</span>
                                <span>@auth
                                        @if (auth()->user()->role == 0)
                                            Admin
                                        @elseif(auth()->user()->role == 1)
                                            Agent
                                        @endif
                                    @endauth
                                </span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="mdi mdi-flag-outline mdi-24px"></i><span class="fw-medium mx-2">Country:</span>
                                <span>{{ Auth::user()->location }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="mdi mdi-translate mdi-24px"></i><span class="fw-medium mx-2">Identity:</span>
                                <span>{{ Str::upper(Auth::user()->identity) }}</span>
                            </li>
                        </ul>
                        <small class="card-text text-uppercase">Contacts</small>
                        <ul class="list-unstyled my-3 py-1">
                            <li class="d-flex align-items-center mb-3">
                                <i class="mdi mdi-phone-outline mdi-24px"></i><span class="fw-medium mx-2">Contact:</span>
                                <span>{{ Auth::user()->phone }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="mdi mdi-email-outline mdi-24px"></i><span class="fw-medium mx-2">Email:</span>
                                <span>{{ Auth::user()->email }}</span>
                            </li>
                        </ul>

                    </div>
                </div>
                <!--/ About User -->

            </div>
            <div class="col-xl-8 col-lg-7 col-md-7">
                <div class="card mb-4">
                    <h5 class="card-header">Change Password</h5>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form id="formAccountSettings" method="POST" action="{{ route('user.password.update') }}">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6 form-password-toggle">
                                    <div class="input-group input-group-merge">
                                        <div class="form-floating form-floating-outline">
                                            <input class="form-control" type="password" name="current_password"
                                                id="currentPassword"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                            <label for="currentPassword">Current Password</label>
                                        </div>
                                        <span class="input-group-text cursor-pointer"><i
                                                class="mdi mdi-eye-off-outline"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 mb-4">
                                <div class="col-md-6 form-password-toggle">
                                    <div class="input-group input-group-merge">
                                        <div class="form-floating form-floating-outline">
                                            <input class="form-control" type="password" id="newPassword" name="new_password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                            <label for="newPassword">New Password</label>
                                        </div>
                                        <span class="input-group-text cursor-pointer"><i
                                                class="mdi mdi-eye-off-outline"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-6 form-password-toggle">
                                    <div class="input-group input-group-merge">
                                        <div class="form-floating form-floating-outline">
                                            <input class="form-control" type="password" name="new_password_confirmation"
                                                id="confirmPassword"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                            <label for="confirmPassword">Confirm New Password</label>
                                        </div>
                                        <span class="input-group-text cursor-pointer"><i
                                                class="mdi mdi-eye-off-outline"></i></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-body">Password Requirements:</h6>
                            <ul class="ps-3 mb-0">
                                <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                                <li class="mb-1">At least one lowercase character</li>
                                <li>At least one number, symbol, or whitespace character</li>
                            </ul>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!--/ User Profile Content -->
    </div>
    <!-- / Content -->
@endsection
@push('vendorsjs')
    <script src="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
@endpush


@push('pagejs')
    {{-- <script src="../../assets/js/app-user-view-account.js"></script> --}}
    <script src="{{ asset('backend/assets/js/app-user-view-account.js') }}"></script>
@endpush

@push('scripts')
@endpush
