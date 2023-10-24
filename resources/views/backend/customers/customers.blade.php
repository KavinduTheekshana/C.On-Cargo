@extends('layouts.backend')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="me-1">
                                <p class="text-heading mb-2">Session</p>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-2 me-1 display-6">21,459</h4>
                                    <p class="text-success mb-2">(+29%)</p>
                                </div>
                                <p class="mb-0">Total Users</p>
                            </div>
                            <div class="avatar">
                                <div class="avatar-initial bg-label-primary rounded">
                                    <div class="mdi mdi-account-outline mdi-24px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="me-1">
                                <p class="text-heading mb-2">Paid Users</p>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-2 me-1 display-6">4,567</h4>
                                    <p class="text-success mb-2">(+18%)</p>
                                </div>
                                <p class="mb-0">Last week analytics</p>
                            </div>
                            <div class="avatar">
                                <div class="avatar-initial bg-label-danger rounded">
                                    <div class="mdi mdi-account-plus-outline mdi-24px scaleX-n1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="me-1">
                                <p class="text-heading mb-2">Active Users</p>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-2 me-1 display-6">19,860</h4>
                                    <p class="text-danger mb-2">(-14%)</p>
                                </div>
                                <p class="mb-0">Last week analytics</p>
                            </div>
                            <div class="avatar">
                                <div class="avatar-initial bg-label-success rounded">
                                    <div class="mdi mdi-account-check-outline mdi-24px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="me-1">
                                <p class="text-heading mb-2">Pending Users</p>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-2 me-1 display-6">237</h4>
                                    <p class="text-success mb-2">(+42%)</p>
                                </div>
                                <p class="mb-0">Last week analytics</p>
                            </div>
                            <div class="avatar">
                                <div class="avatar-initial bg-label-warning rounded">
                                    <div class="mdi mdi-account-search mdi-24px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Users List Table -->
        @include('backend.components.alert')

        <div class="card">
            <div class="card-header border-bottom">
          
                    <h5 class="card-title">Customers Table</h5>

                    <button type="button" class="btn btn-primary">Primary</button>
            
                <h5 class="card-title">Customers Table</h5>
                {{-- <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                    <div class="col-md-4 user_role"></div>
                    <div class="col-md-4 user_plan"></div>
                    <div class="col-md-4 user_status"></div>
                </div> --}}
            </div>
            <div class="card-datatable table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Stars</th>
                        <th>Comment</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>12312</td>
                        <td>12312</td>
                        <td>12312</td>
                        <td>12312</td>
                        <td>12312</td>
               
                        <td>12312</td>
                    </tr>
                </tbody>
            </table>
            </div>
            {{-- <div class="card-datatable table-responsive">
                <table class="datatables-users table">

                    <thead class="table-light">
                        <tr>
                            <th></th>
                            <th></th>
                            <th>User</th>
                            <th>Role</th>
                            <th>Plan</th>
                            <th>Billing</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>sadfsdf</td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
            <!-- Offcanvas to add new user -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser"
                aria-labelledby="offcanvasAddUserLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add Customers</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body mx-0 flex-grow-0 h-100">

                    @include('backend.components.alert')
                    <form class="add-new-user pt-0" method="POST"
                        action="{{ route('customer.save') }}" enctype="multipart/form-data">
                        @csrf

                  


                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="add-user-firstname" placeholder="John"
                                name="firstname" aria-label="John" />
                            <label for="add-user-firstname">First Name</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="add-user-lastname" placeholder="Doe"
                                name="lastname" aria-label="John Doe" />
                            <label for="add-user-lastname">Last Name</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" id="add-user-email" class="form-control"
                                placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email" />
                            <label for="add-user-email">Email</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" id="add-user-contact" class="form-control phone-mask"
                                placeholder="+44 75 032 88 488" aria-label="john.doe@example.com" name="contact" />
                            <label for="add-user-contact">Contact</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" id="add-user-address" class="form-control"
                                placeholder="12 King Arthur Ct,Waltham Cross" aria-label="jdoe1" name="address" />
                            <label for="add-user-company">Address</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" id="add-user-postcode" class="form-control" placeholder="EN8 8EH"
                                aria-label="jdoe1" name="postcode" />
                            <label for="add-user-company">Post Code</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <select name="country" id="country" class="select2 form-select">
                                <option value="">Select</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="United Kingdom">United Kingdom</option>
                            </select>
                            <label for="country">Country</label>
                        </div>
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
       
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
@push('vendorsjs')
    <script src="{{ asset('backend/assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
@endpush


@push('pagejs')
<script>
     $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
    <script src="{{ asset('backend/assets/js/app-user-list.js') }}"></script>
@endpush
