@extends('layouts.frontend')

@section('content')
    <main>
        <!-- breadcrumb-area-start -->
        {{-- @section('page_img', asset('frontend/assets/img/bg/bg-10.jpg'))
        @section('page_name', 'Dashboard')
        @include('frontend.components.authbreadcrumb') --}}
        <!-- breadcrumb-area-end -->

        <div class="skills-area pos-rel pt-130 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Nav tabs -->

                        <ul class="nav flex-column" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active btn white-btn squre-btn squre-shadow" data-toggle="tab"
                                    href="#booking">Booking</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn squre-btn white-btn squre-shadow" data-toggle="tab"
                                    href="#booking-list">Bookings List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn squre-btn white-btn squre-shadow" data-toggle="tab"
                                    href="#address">Address Book</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn squre-btn white-btn squre-shadow" data-toggle="tab"
                                    href="#password">Change Password</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn squre-btn white-btn squre-shadow" href="{{ route('logout') }}">Logout</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <!-- Tab panes -->
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="tab-content">
                            <div id="booking" class="container tab-pane active">
                                <form class="appiontment-form" id="quote-form">
                                    @csrf
                                    <div class="form-group">
                                        <label for="inputState">From Address</label>
                                        <div class="pro-filter">
                                            <select id="destination" name="sender">
                                                <option selected>Choose...</option>
                                                @forelse ($address as $item)

                                                        <option value="{{ $item->id }}">{{ $item->firstname }}
                                                            {{ $item->lastname }} |
                                                            {{ $item->address }}, {{ $item->postcode }},
                                                            {{ $item->country }}
                                                        </option>

                                                @empty
                                                <option>Please Add Address using Address Tab</option>
                                                @endforelse

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputState">To Address</label>
                                        <div class="pro-filter">
                                            <select id="destination" name="receiver">
                                                <option selected>Choose...</option>
                                                @foreach ($address as $item)
                                                    <option value="{{ $item->id }}">{{ $item->firstname }}
                                                        {{ $item->lastname }} |
                                                        {{ $item->address }}, {{ $item->postcode }}, {{ $item->country }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <label>&nbsp;Please Enter the Centimeter Value <span
                                            class="theme-color">(<b>CM</b>)</span></label>
                                    <div class="row">

                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-20">
                                                <input type="number" id="height" name="height" placeholder="Height"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-20">
                                                <input type="number" id="width" name="width" placeholder="Width"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-20">
                                                <input type="number" id="length" name="length" placeholder="Length"
                                                    required>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <label for="inputCity">Number Of Kilogram (KG)</label>
                                        <input type="number" class="form-control" name="weight">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputCity">Contact Number</label>
                                        <input type="text" class="form-control" name="contact">
                                    </div>

                                    <button type="submit" class="btn btn-primary squre-btn">Submit</button>
                                </form>
                            </div>
                            <div id="booking-list" class="container tab-pane fade">
                                @forelse ($bookings as $item)

                                        <div class="card mb-10 ">
                                            <div class="card-body">
                                                <a onclick="openSweetAlertBooking({{ $item->id }})"
                                                    class="delete-btn"><i class="fas fa-solid fa-trash"></i></a>
                                                @if ($item->status == 0)
                                                    <h6 class="card-title"><span class="badge badge-warning">&nbsp;
                                                            Pending... | Reference Number:
                                                            #{{ $item->id }}&nbsp;</span></h6>
                                                @elseif ($item->status == 1)
                                                    <h6 class="card-title"><span class="badge badge-success">&nbsp;
                                                            Approved
                                                            Reference Number: #{{ $item->id }}&nbsp;</span></h6>
                                                @endif



                                                <p class="card-text m-0"><b>Sender Details:</b></p>
                                                <p class="card-text m-0">{{ $item->sender->firstname }}
                                                    {{ $item->sender->lastname }}</p>
                                                <p class="card-text m-0">Address: {{ $item->sender->address }}</p>
                                                <p class="card-text m-0">Post Code: {{ $item->sender->postcode }}</p>
                                                <p class="card-text m-0">Country: {{ $item->sender->country }}</p>
                                                <p class="card-text m-0">Email: {{ $item->sender->email }}</p>
                                                <p class="card-text m-0">Contact: {{ $item->sender->contact }}</p>
                                                <hr>
                                                <p class="card-text m-0"><b>Receiver Details:</b></p>
                                                <p class="card-text m-0">{{ $item->receiver->firstname }}
                                                    {{ $item->receiver->lastname }}</p>
                                                <p class="card-text m-0">Address: {{ $item->receiver->address }}</p>
                                                <p class="card-text m-0">Post Code: {{ $item->receiver->postcode }}</p>
                                                <p class="card-text m-0">Country: {{ $item->receiver->country }}</p>
                                                <p class="card-text m-0">Email: {{ $item->receiver->email }}</p>
                                                <p class="card-text m-0">Contact: {{ $item->receiver->contact }}</p>
                                                <hr>
                                                <p class="card-text m-0"><b>Dimension:</b></p>
                                                <p class="card-text m-0">Width: {{ $item->width }} | Height:
                                                    {{ $item->height }} | Length: {{ $item->length }}</p>
                                                <hr>
                                                <p class="card-text m-0"><b>Contact Number:</b></p>
                                                <p class="card-text m-0">Contact: {{ $item->contact }}</p>
                                            </div>
                                        </div>

                                @empty
                                    <div class="alert alert-info">
                                        No bookings found.
                                    </div>
                                @endforelse

                            </div>
                            <div id="address" class="container tab-pane fade">
                                <button class="btn squre-btn white-btn squre-shadow" data-toggle="modal"
                                    data-target="#exampleModalCenter"> <i class=" far fa-solid fa-plus"></i> &nbsp; Add
                                    New
                                    Address</button>
                                <hr>
                                @foreach ($address as $item)
                                    <div class="card mb-10 ">
                                        <div class="card-body">
                                            <a onclick="openSweetAlert({{ $item->id }})" class="delete-btn"><i
                                                    class="fas fa-solid fa-trash"></i></a>
                                            <h5 class="card-title">{{ $item->firstname }} {{ $item->lastname }}</h5>
                                            <p class="card-text m-0"><b>Address: </b>{{ $item->address }}</p>
                                            <p class="card-text m-0"><b>Post Code: </b>{{ $item->postcode }}</p>
                                            <p class="card-text m-0"><b>Country: </b>{{ $item->country }}</p>
                                            <p class="card-text m-0"><b>Email: </b>{{ $item->email }}</p>
                                            <p class="card-text m-0"><b>Contact: </b>{{ $item->contact }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div id="password" class="container tab-pane fade">



                                <form class="appiontment-form" action="{{ route('regularuser.password.update') }}"
                                    method="POST">
                                    @csrf
                                    <div class="text-center center-align-content">
                                        <h1 class="text-center mb-30">Change Password</h1>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="mb-20">
                                                <input type="password" name="current_password"
                                                    placeholder="Current Password">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="mb-20">
                                                <input type="password" name="new_password" placeholder="New Password">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="mb-20">
                                                <input type="password" name="new_password_confirmation"
                                                    placeholder="Confirm New Password">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="mb-20">
                                                <button class="btn red-btn squre-btn" type="submit">Change
                                                    Password</button>
                                            </div>
                                        </div>





                                    </div>
                                </form>
                                <div class="pwd-req">
                                    <h6 class="text-body">Password Requirements:</h6>
                                    <ul class="ps-3 mb-0">
                                        <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                                        <li class="mb-1">At least one lowercase character</li>
                                        <li>At least one number, symbol, or whitespace character</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- Modal  --}}
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Address</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="customerForm">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">First Name</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="firstname"
                                        placeholder="First Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Last Name</label>
                                    <input type="text" class="form-control" id="inputPassword4" name="lastname"
                                        placeholder="Last Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputAddress2">Address</label>
                                <input type="text" class="form-control" id="inputAddress2" name="address"
                                    placeholder="Apartment, studio, or floor">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Email Address</label>
                                    <input type="email" class="form-control" id="inputAddress" name="email"
                                        placeholder="abc@example.com">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputContact">Contact</label>
                                    <input type="text" class="form-control" id="inputContact" name="contact"
                                        placeholder="+44 76 12122 129">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPostCode">Post Code</label>
                                    <input type="text" class="form-control" id="inputPostCode" name="postcode"
                                        placeholder="SW5 9HD">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCounrey">Country</label>
                                    <input name="country" type="text" class="form-control" id="inputCounrey"
                                        placeholder="United Kingdom">
                                </div>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" style="padding: 16px 34px 16px 30px; border-radius: 0px"
                            class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" style="padding: 16px 34px 16px 30px; border-radius: 0px"
                            class="btn btn-primary">Save Address</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#customerForm').submit(function(e) {
                e.preventDefault(); // Prevent the default form submit

                $.ajax({
                    url: "{{ route('user.customer.save') }}", // Laravel route
                    type: "POST",
                    data: $(this).serialize(), // Serialize form data
                    success: function(response) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Customer added successfully!',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location
                                    .reload(); // Reload the page when the user clicks 'Ok'
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        console.error("Error:", error);
                    }
                });
            });
        });

        // Sweet Alert
        function openSweetAlert($id) {
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
                    fetch(`/address/delete/${$id}`, {
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


        function openSweetAlertBooking($id) {
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
                    console.log($id);
                    fetch(`/booking/delete/${$id}`, {
                            method: 'GET',
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.message === 'Booking deleted successfully') {
                                Swal.fire('Deleted!', 'The Booking has been deleted.', 'success');
                                // Reload the current page after a short delay
                                setTimeout(() => {
                                    location.reload();
                                }, 1000); // 1000 milliseconds = 1 second
                            } else if (data.message ===
                                'Booking cannot be deleted because order is approved.') {
                                Swal.fire('Error',
                                    'Booking cannot be deleted because Order is Approved.',
                                    'error');
                            } else {
                                Swal.fire('Error', 'Something went wrong!', 'error');
                            }
                        });
                }
            })
        }

        $(document).ready(function() {
            $('#quote-form').submit(function(e) {
                e.preventDefault();
                var form = this;
                $.ajax({
                    type: "POST",
                    url: "{{ route('user.booking.store') }}", // Laravel route
                    data: $(this).serialize(), // serializes the form's elements
                    success: function(response) {
                        // handle success
                        console.log(response);
                        form.reset();
                        Swal.fire({
                            title: 'Success!',
                            html: 'Booking confirmed! An agent will contact you soon. Thank you for choosing our services.<br><br>Your Booking Reference: #' +
                                response.booking_id,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = window.location.href.split('#')[
                                    0] + '#bookings-list';
                                window.location.reload();
                            }
                        });
                    },
                    error: function(error) {
                        // handle error
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endpush
