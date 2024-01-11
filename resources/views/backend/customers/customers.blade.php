@extends('layouts.backend')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

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
            </div>
            <div class="card-datatable table-responsive">
                <table id="customerTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $classes = ['bg-label-warning', 'bg-label-danger', 'bg-label-info', 'bg-label-primary', 'bg-label-secondary', 'bg-label-success'];
                        @endphp
                        @foreach ($customers as $index => $customer)
                            <tr>
                                <td>C{{ $customer->id }}</td>
                                <td>
                                    <div class="d-flex mb-3">
                                        <div class="avatar me-2">
                                            <span
                                                class="avatar-initial rounded-circle {{ $classes[$index % count($classes)] }}">{{ strtoupper(substr($customer->firstname, 0, 1)) }}{{ strtoupper(substr($customer->lastname, 0, 1)) }}</span>
                                        </div>
                                        <div class="flex-grow-1 row">
                                            <div class="col-9 mb-sm-0 mb-2">
                                                <h6 class="mb-0">{{ $customer->firstname }}&nbsp;{{ $customer->lastname }}
                                                </h6>
                                                <span>{{ $customer->email }} <br>
                                                    {{ $customer->contact }} <br>
                                                    @if ($customer->status)
                                                        <span class="badge rounded-pill bg-success">Active</span>
                                                    @else
                                                        <span class="badge rounded-pill bg-warning">Diactive</span>
                                                    @endif
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                </td>

                                <td>{{ $customer->address }} - {{ $customer->postcode }} | {{ $customer->country }}</td>

                                <td>
                                    <div class="row">
                                        <button type="button"
                                            class="btn btn-icon btn-dark btn-fab demo waves-effect waves-light m-1 view-invoices"
                                            data-bs-toggle="modal" title="View Invoice"
                                            data-customerid="{{ $customer->id }}" data-bs-target="#addNewAddress">
                                            <i class="tf-icons mdi mdi-eye-outline"></i>
                                        </button>

                                        @if ($customer->status)
                                            <a href="{{ route('customer.diactive', ['id' => $customer->id]) }}"
                                                type="button"
                                                class="btn btn-icon btn-warning btn-fab demo waves-effect waves-light m-1">
                                                <i class="tf-icons mdi mdi-lock-outline"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('customer.active', ['id' => $customer->id]) }}"
                                                type="button"
                                                class="btn btn-icon btn-success btn-fab demo waves-effect waves-light m-1">
                                                <i class="tf-icons mdi mdi-lock-open-variant-outline"></i>
                                            </a>
                                        @endif

                                        <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd2"
                                            aria-controls="offcanvasEnd" data-customer-id="{{ $customer->id }}"
                                            title="Edit Customer" data-toggle="tooltip"
                                            class="btn btn-icon btn-info btn-fab demo waves-effect waves-light m-1 updatebtn">
                                            <i class="tf-icons mdi mdi-file-edit-outline"></i>
                                        </button>

                                        <button type="button" onclick="openSweetAlert({{ $customer->id }})"
                                            class="btn btn-icon btn-danger btn-fab demo waves-effect waves-light m-1">
                                            <i class="tf-icons mdi mdi-trash-can-outline"></i>
                                        </button>

                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

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


                            {{-- <input type="text" id="add-user-country" class="form-control"
                            placeholder="United Kingdom" aria-label="jdoe1" name="country"
                            value="{{ old('country') }}" /> --}}
                            <select name="country" id="customer_country" class="select form-select">
                                <option value="">Select</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="France">France</option>
                                <option value="India">India</option>
                                <option value="Italy">Italy</option>
                                <option value="Canada">Canada</option>
                            </select>
                            <label for="add-user-company">Country</label>
                            @error('country')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>

                    </form>
                </div>
            </div>

            {{-- Update Customer  --}}
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd2" aria-labelledby="offcanvasEndLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Update Customers</h5>
                    <button id="btnClose" type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body mx-0 flex-grow-0 h-100">

                    <form class="add-new-user pt-0" method="POST" action="{{ route('customer.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" name="customer_id" value="">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="add-customer-firstname" placeholder="John"
                                name="customer_firstname" aria-label="John" value="{{ old('firstname') }}" />
                            <label for="add-customer-firstname">First Name</label>
                            @error('firstname')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="add-customer-lastname" placeholder="Doe"
                                name="customer_lastname" aria-label="Doe" value="{{ old('lastname') }}" />
                            <label for="add-customer-lastname">Last Name</label>
                            @error('lastname')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" id="add-customer-email" class="form-control"
                                placeholder="john.doe@example.com" aria-label="john.doe@example.com"
                                name="customer_email" value="{{ old('email') }}" />
                            <label for="add-customer-email">Email</label>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" id="add-customer-contact" class="form-control phone-mask"
                                placeholder="+44 75 032 88 488" aria-label="john.doe@example.com" name="customer_contact"
                                value="{{ old('contact') }}" />
                            <label for="add-customer-contact">Contact</label>
                            @error('contact')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" id="add-customer-address" class="form-control"
                                placeholder="12 King Arthur Ct,Waltham Cross" aria-label="jdoe1" name="customer_address"
                                value="{{ old('address') }}" />
                            <label for="add-customer-company">Address</label>
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" id="add-customer-postcode" class="form-control" placeholder="EN8 8EH"
                                aria-label="jdoe1" name="customer_postcode" value="{{ old('postcode') }}" />
                            <label for="add-customer-company">Post Code</label>
                            @error('postcode')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <select name="customer_country" id="customer_country" class="select form-select">
                                <option value="">Select</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="France">France</option>
                                <option value="India">India</option>
                                <option value="Italy">Italy</option>
                                <option value="Canada">Canada</option>
                            </select>
                            <label for="customer_country">Country</label>
                            @error('customer_country')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

    {{-- Modal  --}}
    <div class="modal fade" id="addNewAddress" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-simple modal-add-new-address">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body p-md-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div id="invoiceDetails"></div>

                </div>
            </div>
        </div>
    </div>
    {{-- Modal  --}}
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

@push('scripts')
    <script>
        // datatable


        $(document).ready(function() {
            $('#customerTable').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
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

                    fetch(`/customer/delete/${$id}`, {
                            method: 'GET',
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.message === 'Customer deleted successfully') {
                                Swal.fire('Deleted!', 'The Customer has been deleted.', 'success');
                                // Reload the current page after a short delay
                                setTimeout(() => {
                                    location.reload();
                                }, 1000); // 1000 milliseconds = 1 second
                            } else if (data.message ===
                                'Customer cannot be deleted because there are associated invoices.') {
                                Swal.fire('Error',
                                    'Customer cannot be deleted because there are associated invoices.',
                                    'error');
                            } else {
                                Swal.fire('Error', 'Something went wrong!', 'error');
                            }
                        });


                }
            })
        }

        // shipments
        $(document).ready(function() {
            var dataTable = $('#customer').DataTable({
                "columnDefs": [{
                        "width": "20px",
                        "targets": 0
                    }, {
                        "width": "30%",
                        "targets": 1
                    },
                    {
                        "width": "50%",
                        "targets": 2
                    }
                ]
            });

            // Edit Customer in Off canves
            // document.querySelectorAll('.updatebtn').forEach(button => {
            //     button.addEventListener('click', function() {
            //         const customerId = this.getAttribute('data-customer-id');
            //         console.log("sdfsd");
            //         // AJAX request using jQuery
            //         $.ajax({
            //             url: '/customers/details/' + customerId,
            //             type: 'GET',
            //             success: function(response) {
            //                 // Populate the offcanvas with customer data

            //                 populateOffcanvas(response);
            //             },
            //             error: function(xhr, status, error) {
            //                 // Handle the error
            //                 console.error("Error occurred: " + status + ", " + error);
            //                 // Optionally, display an error message to the user
            //                 alert("An error occurred. Please try again.");
            //             }
            //         });
            //     });
            // });

            $(document).ready(function() {
                $(document).on('click', '.updatebtn', function() {
                    const customerId = $(this).data('customer-id');
                    console.log(customerId);

                    // AJAX request using jQuery
                    $.ajax({
                        url: '/customers/details/' + customerId,
                        type: 'GET',
                        success: function(response) {
                            // Populate the offcanvas with customer data
                            populateOffcanvas(response);
                        },
                        error: function(xhr, status, error) {
                            // Handle the error
                            console.error("Error occurred: " + status + ", " + error);
                            // Optionally, display an error message to the user
                            alert("An error occurred. Please try again.");
                        }
                    });
                });
            });



            function populateOffcanvas(customerData) {
                $('#id').val(customerData.id);
                $('#add-customer-firstname').val(customerData.firstname);
                $('#add-customer-lastname').val(customerData.lastname);
                $('#add-customer-email').val(customerData.email);
                $('#add-customer-contact').val(customerData.contact);
                $('#add-customer-address').val(customerData.address);
                $('#add-customer-postcode').val(customerData.postcode);
                $('#customer_country').val(customerData.country);
            }


            // Event delegation for dynamically loaded content
            $('#customerTable').on('click', '.view-invoices', function() {
                var customerId = $(this).data('customerid');
                // Clear any previous invoice details
                $('#invoiceDetails').empty();

                // Now make the AJAX call to get the new data
                $.ajax({
                    url: '/get-invoice-details/' + customerId,
                    type: 'GET',
                    success: function(data) {
                        // Populate the modal with new data
                        $('#invoiceDetails').html(data);
                        // Show the modal
                        $('#addNewAddress').modal('show');
                    },
                    error: function() {
                        // Handle any errors
                        $('#invoiceDetails').html(
                            '<p>There was an error loading the invoices. Please try again later.</p>'
                        );
                    }
                });
            });

            // Clear the modal data when it's closed
            $('#addNewAddress').on('hidden.bs.modal', function() {
                $('#invoiceDetails').empty();
                // Optionally insert 'No data' if needed
                $('#invoiceDetails').html('<p>No data available.</p>');
            });
        });
    </script>
@endpush
