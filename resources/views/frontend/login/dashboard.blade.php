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
                                    href="#home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn squre-btn white-btn squre-shadow" data-toggle="tab"
                                    href="#menu1">Menu 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn squre-btn white-btn squre-shadow" data-toggle="tab"
                                    href="#menu2">Address Book</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn squre-btn white-btn squre-shadow" href="{{ route('logout') }}">Logout</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="home" class="container tab-pane active">
                                <button class="btn squre-btn white-btn squre-shadow" data-toggle="modal"
                                    data-target="#exampleModalCenter"> <i class=" far fa-solid fa-plus"></i> &nbsp; Add New
                                    Address</button>
                                <hr>
                                @foreach ($address as $item)
                                    <div class="card mb-10 ">
                                        <div class="card-body">
                                            <a onclick="openSweetAlert({{ $item->id }})" class="delete-btn"><i class="fas fa-solid fa-trash"></i></a>
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
                            <div id="menu1" class="container tab-pane fade">
                                <h3>Menu 1</h3>
                                <p>Menu 1 content goes here.</p>
                            </div>
                            <div id="menu2" class="container tab-pane fade">

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
                        console.log(response);
                        location.reload();
                        alert('Customer added successfully!');
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
                    console.log($id);
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
    </script>
@endpush
