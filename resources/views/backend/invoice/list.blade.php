@extends('layouts.backend')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Invoice /</span> List</h4>

        <!-- Invoice List Widget -->

        <div class="card mb-4">
            <div class="card-widget-separator-wrapper">
                <div class="card-body card-widget-separator">
                    <div class="row gy-4 gy-sm-1">
                        <div class="col-sm-6 col-lg-3">
                            <div
                                class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                <div>
                                    <h3 class="mb-1">24</h3>
                                    <p class="mb-0">Clients</p>
                                </div>
                                <div class="avatar me-sm-4">
                                    <span class="avatar-initial rounded bg-label-secondary">
                                        <i class="mdi mdi-account-outline text-heading mdi-20px"></i>
                                    </span>
                                </div>
                            </div>
                            <hr class="d-none d-sm-block d-lg-none me-4" />
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div
                                class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                                <div>
                                    <h3 class="mb-1">165</h3>
                                    <p class="mb-0">Invoices</p>
                                </div>
                                <div class="avatar me-lg-4">
                                    <span class="avatar-initial rounded bg-label-secondary">
                                        <i class="mdi mdi-content-paste text-heading mdi-20px"></i>
                                    </span>
                                </div>
                            </div>
                            <hr class="d-none d-sm-block d-lg-none" />
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div
                                class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
                                <div>
                                    <h3 class="mb-1">$2.46k</h3>
                                    <p class="mb-0">Paid</p>
                                </div>
                                <div class="avatar me-sm-4">
                                    <span class="avatar-initial rounded bg-label-secondary">
                                        <i class="mdi mdi-currency-usd text-heading mdi-20px"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h3 class="mb-1">$876</h3>
                                    <p class="mb-0">Unpaid</p>
                                </div>
                                <div class="avatar">
                                    <span class="avatar-initial rounded bg-label-secondary">
                                        <i class="mdi mdi-currency-usd-off text-heading mdi-20px"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Invoice List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Invoice List Table</h5>
                    </div>
                    <div class="col d-flex" style="justify-content: end"> <a href="{{ route('create') }}" type="button"
                            class="btn btn-primary"><span class="mdi mdi-plus"></span> &nbsp;Create Invoice</a></div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table id="invoice" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Job Number</th>
                            <th>Customer ID</th>
                            <th>Sender Details</th>
                            {{-- <th>Receiver Details</th> --}}
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach ($invoices as $item)
                    <tr>
                        <td>{{$item->invoice_id}}</td>
                        <td>{{$item->date}}</td>
                        <td>{{$item->job_number}}</td>
                        <td>{{$item->customer_id}}</td>
                        <td><b>{{$item->sender->firstname}}&nbsp;{{$item->sender->lastname}} </b><br>{{$item->sender->address}}</td>
                        {{-- <td><b>{{$item->receiver->firstname}}&nbsp;{{$item->receiver->lastname}} </b><br>{{$item->receiver->address}}</td> --}}
                        <td>£{{$item->total_fee}}</td>
                        <td>

                            <button type="button"
                                class="btn btn-icon btn-dark btn-fab demo waves-effect waves-light m-1" data-bs-toggle="modal"
                                data-bs-target="#addNewAddress">
                                <i class="tf-icons mdi mdi-eye-outline"></i>
                            </button>
                            
                            <a type="button" href="{{ route('invoice.preview', ['id' => $item->id]) }}"
                                class="btn btn-icon btn-primary btn-fab demo waves-effect waves-light m-1">
                                <i class="tf-icons mdi mdi-page-next-outline"></i>
                            </a>
                            

                            <button type="button" onclick="openSweetAlert({{ $item->id }})"
                                class="btn btn-icon btn-danger btn-fab demo waves-effect waves-light m-1">
                                <i class="tf-icons mdi mdi-trash-can-outline"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- / Content -->


    {{-- Modal  --}}
    <div class="modal fade" id="addNewAddress" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
          <div class="modal-content p-3 p-md-5">
            <div class="modal-body p-md-0">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="text-center mb-4">
                <h3 class="address-title mb-2 pb-1">Add New Address</h3>
                <p class="address-subtitle">Add new address for express delivery</p>
              </div>
              <form id="addNewAddressForm" class="row g-4" onsubmit="return false">
                <div class="col-12">
                  <div class="row">
                    <div class="col-md mb-md-0 mb-3">
                      <div class="form-check custom-option custom-option-icon custom-option-label">
                        <label class="form-check-label custom-option-content" for="customRadioHome">
                          <span class="custom-option-body">
                            <i class="mdi mdi-home-outline"></i>
                            <span class="custom-option-title">Home</span>
                            <small> Delivery time (9am – 9pm) </small>
                          </span>
                          <input
                            name="customRadioIcon"
                            class="form-check-input"
                            type="radio"
                            value=""
                            id="customRadioHome"
                            checked />
                        </label>
                      </div>
                    </div>
                    <div class="col-md mb-md-0 mb-3">
                      <div class="form-check custom-option custom-option-icon custom-option-label">
                        <label class="form-check-label custom-option-content" for="customRadioOffice">
                          <span class="custom-option-body">
                            <i class="mdi mdi-briefcase-outline"></i>
                            <span class="custom-option-title"> Office </span>
                            <small> Delivery time (9am – 5pm) </small>
                          </span>
                          <input
                            name="customRadioIcon"
                            class="form-check-input"
                            type="radio"
                            value=""
                            id="customRadioOffice" />
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input
                      type="text"
                      id="modalAddressFirstName"
                      name="modalAddressFirstName"
                      class="form-control"
                      placeholder="John" />
                    <label for="modalAddressFirstName">First Name</label>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input
                      type="text"
                      id="modalAddressLastName"
                      name="modalAddressLastName"
                      class="form-control"
                      placeholder="Doe" />
                    <label for="modalAddressLastName">Last Name</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating form-floating-outline">
                    <select
                      id="modalAddressCountry"
                      name="modalAddressCountry"
                      class="select2 form-select"
                      data-allow-clear="true">
                      <option value="">Select</option>
                      <option value="Australia">Australia</option>
                      <option value="Bangladesh">Bangladesh</option>
                      <option value="Belarus">Belarus</option>
                      <option value="Brazil">Brazil</option>
                      <option value="Canada">Canada</option>
                      <option value="China">China</option>
                      <option value="France">France</option>
                      <option value="Germany">Germany</option>
                      <option value="India">India</option>
                      <option value="Indonesia">Indonesia</option>
                      <option value="Israel">Israel</option>
                      <option value="Italy">Italy</option>
                      <option value="Japan">Japan</option>
                      <option value="Korea">Korea, Republic of</option>
                      <option value="Mexico">Mexico</option>
                      <option value="Philippines">Philippines</option>
                      <option value="Russia">Russian Federation</option>
                      <option value="South Africa">South Africa</option>
                      <option value="Thailand">Thailand</option>
                      <option value="Turkey">Turkey</option>
                      <option value="Ukraine">Ukraine</option>
                      <option value="United Arab Emirates">United Arab Emirates</option>
                      <option value="United Kingdom">United Kingdom</option>
                      <option value="United States">United States</option>
                    </select>
                    <label for="modalAddressCountry">Country</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating form-floating-outline">
                    <input
                      type="text"
                      id="modalAddressAddress1"
                      name="modalAddressAddress1"
                      class="form-control"
                      placeholder="12, Business Park" />
                    <label for="modalAddressAddress1">Address Line 1</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating form-floating-outline">
                    <input
                      type="text"
                      id="modalAddressAddress2"
                      name="modalAddressAddress2"
                      class="form-control"
                      placeholder="Mall Road" />
                    <label for="modalAddressAddress2">Address Line 2</label>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input
                      type="text"
                      id="modalAddressLandmark"
                      name="modalAddressLandmark"
                      class="form-control"
                      placeholder="Nr. Hard Rock Cafe" />
                    <label for="modalAddressLandmark">Landmark</label>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input
                      type="text"
                      id="modalAddressCity"
                      name="modalAddressCity"
                      class="form-control"
                      placeholder="Los Angeles" />
                    <label for="modalAddressCity">City</label>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input
                      type="text"
                      id="modalAddressState"
                      name="modalAddressState"
                      class="form-control"
                      placeholder="California" />
                    <label for="modalAddressLandmark">State</label>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input
                      type="text"
                      id="modalAddressZipCode"
                      name="modalAddressZipCode"
                      class="form-control"
                      placeholder="99950" />
                    <label for="modalAddressZipCode">Zip Code</label>
                  </div>
                </div>
                <div class="col-12">
                  <label class="switch">
                    <input type="checkbox" class="switch-input" />
                    <span class="switch-toggle-slider">
                      <span class="switch-on"></span>
                      <span class="switch-off"></span>
                    </span>
                    <span class="switch-label">Use as a billing address?</span>
                  </label>
                </div>
                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                  <button
                    type="reset"
                    class="btn btn-outline-secondary"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                    Cancel
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

@endsection
@push('vendorsjs')
    <script src="{{ asset('backend/assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
@endpush


@push('pagejs')
    <script src="{{ asset('backend/assets/js/app-invoice-list.js') }}"></script>
@endpush

@push('scripts')
    <script>
        // datatable 
        $(document).ready(function() {
            $('#invoice').DataTable({
              "order": [[ 0, "desc" ]]
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

                    fetch(`/invoice-delete/${$id}`, {
                            method: 'GET',
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.message === 'Invoice deleted successfully') {
                                Swal.fire('Deleted!', 'The Invoice has been deleted.', 'success');
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
