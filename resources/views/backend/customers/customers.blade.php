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
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Customers Table</h5>
                    </div>
                    <div class="col d-flex" style="justify-content: end"> <button type="button" class="btn btn-primary"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd"><span
                                class="mdi mdi-plus"></span> &nbsp;Add Customer</button></div>
                </div>


                {{-- <h5 class="card-title">Customers Table</h5> --}}
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
                            <th>Customer</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Post Code</th>
                            <th>Country</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>
                                    <div class="d-flex mb-3">
                                        <div class="avatar me-2">
                                            <span
                                                class="avatar-initial rounded-circle bg-label-danger">{{ strtoupper(substr($customer->firstname, 0, 1)) }}{{ strtoupper(substr($customer->lastname, 0, 1)) }}</span>
                                        </div>
                                        <div class="flex-grow-1 row">
                                            <div class="col-9 mb-sm-0 mb-2">
                                                <h6 class="mb-0">{{ $customer->firstname }}&nbsp;{{ $customer->lastname }}
                                                </h6>
                                                <span>{{ $customer->email }}&nbsp;@if ($customer->status)
                                                        <span class="badge rounded-pill bg-label-success">Active</span>
                                                    @else
                                                        <span class="badge rounded-pill bg-label-danger">Diactive</span>
                                                    @endif
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                </td>
                                <td>{{ $customer->contact }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->postcode }}</td>
                                <td>
                                    {{ $customer->country }}
                                </td>





                                <td>
                                    @if ($customer->status)
                                        <a href="{{ route('customer.diactive', ['id' => $customer->id]) }}" type="button"
                                            class="btn btn-icon btn-danger btn-fab demo waves-effect waves-light">
                                            <i class="tf-icons mdi mdi-lock-outline"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('customer.active', ['id' => $customer->id]) }}" type="button"
                                            class="btn btn-icon btn-success btn-fab demo waves-effect waves-light">
                                            <i class="tf-icons mdi mdi-lock-open-variant-outline"></i>
                                        </a>
                                    @endif

                                    <button type="button" onclick="openSweetAlert({{ $customer->id }})"
                                        class="btn btn-icon btn-warning btn-fab demo waves-effect waves-light">
                                        <i class="tf-icons mdi mdi-trash-can-outline"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
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
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add Customers</h5>
                    <button id="btnClose" type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body mx-0 flex-grow-0 h-100">

                    <form class="add-new-user pt-0" method="POST" action="{{ route('customer.save') }}"
                        enctype="multipart/form-data">
                        @csrf




                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="add-user-firstname" placeholder="John"
                                name="firstname" aria-label="John" value="{{ old('firstname') }}" />
                            <label for="add-user-firstname">First Name</label>
                            @error('firstname')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="add-user-lastname" placeholder="Doe"
                                name="lastname" aria-label="Doe" value="{{ old('lastname') }}" />
                            <label for="add-user-lastname">Last Name</label>
                            @error('lastname')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" id="add-user-email" class="form-control"
                                placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email"
                                value="{{ old('email') }}" />
                            <label for="add-user-email">Email</label>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" id="add-user-contact" class="form-control phone-mask"
                                placeholder="+44 75 032 88 488" aria-label="john.doe@example.com" name="contact"
                                value="{{ old('contact') }}" />
                            <label for="add-user-contact">Contact</label>
                            @error('contact')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" id="add-user-address" class="form-control"
                                placeholder="12 King Arthur Ct,Waltham Cross" aria-label="jdoe1" name="address"
                                value="{{ old('address') }}" />
                            <label for="add-user-company">Address</label>
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" id="add-user-postcode" class="form-control" placeholder="EN8 8EH"
                                aria-label="jdoe1" name="postcode" value="{{ old('postcode') }}" />
                            <label for="add-user-company">Post Code</label>
                            @error('postcode')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <select name="country" id="country" class="select2 form-select">
                                <option value="">Select</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="United Kingdom">United Kingdom</option>
                            </select>
                            <label for="country">Country</label>
                            @error('country')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
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
    <script src="{{ asset('backend/assets/js/app-user-list.js') }}"></script>
@endpush

@push('pagejs')
    <script>
        // datatable 
        $(document).ready(function() {
            $('#example').DataTable();
        });

        // Sweet Alert 
        function openSweetAlert($id) {
            console.log($id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    fetch(`/customer-delete/${$id}`, {
                            method: 'GET',
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.message === 'Item deleted successfully') {
                                Swal.fire('Deleted!', 'The item has been deleted.', 'success');
                                // Reload the current page after a short delay
                                setTimeout(() => {
                                    location.reload();
                                }, 1000); // 1000 milliseconds = 1 second
                            } else {
                                Swal.fire('Error', 'Something went wrong!', 'error');
                            }
                        });


                }
            })
        }
    </script>
@endpush
