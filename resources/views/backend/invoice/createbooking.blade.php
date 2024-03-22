@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/flatpickr/flatpickr.css') }}" />
@endpush

@extends('layouts.backend')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row invoice-add">
            <!-- Invoice Add-->



            <div class="col-lg-9 col-12 mb-lg-0 mb-4">
                <form action="{{ route('invoices.store.booking') }}" method="POST">
                    @csrf
                    <div class="card invoice-preview-card">
                        <div class="card-body">
                            <div class="row mx-0">
                                <div class="col-md-7 mb-md-0 mb-4 ps-0">
                                    <div class="svg-illustration align-items-center gap-2 mb-4">
                                        <div class="row">


                                            <div class="col">
                                                <span class="app-brand-logo demo">
                                                    <img width="140px"
                                                        src="{{ asset('frontend/assets/img/logo/logodarkcargo.svg') }}"
                                                        alt="" />
                                                </span>
                                            </div>
                                            <div class="col">
                                                <h1><b>INVOICE</b></h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <p class="mb-1"><b>C.ON Group Ltd</b></p>
                                            <p class="mb-1">12 King Arthur Road, Waltham Cross, London, EN8 8EH</p>
                                            <p class="mb-1">info@concargo.co.uk</p>
                                            <p class="mb-0">+44 7503 288 488</p>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <p class="mb-1"><b>C.On Cargo Ltd</b></p>
                                            <p class="mb-1">184/B, Moratuwa Road, Piliyandala, <br>Sri Lanka</p>
                                            <p class="mb-1">sl@concargo.co.uk</p>
                                            <p class="mb-0">+94 766 99 66 52</p>
                                        </div> --}}
                                    </div>

                                </div>

                                <div class="col-md-5 pe-0 ps-0 ps-md-2">
                                    <dl class="row mb-2 g-2">
                                        <dt class="col-sm-6 mb-2 d-md-flex align-items-center justify-content-end">
                                            <span class="h4 text-capitalize mb-0 text-nowrap">Invoice</span>
                                        </dt>
                                        <dd class="col-sm-6">
                                            <div class="input-group input-group-merge disabled">
                                                <span class="input-group-text">#</span>
                                                @if (auth()->user() && auth()->user()->role == 0)
                                                <select  name="invoice_id" id="invoiceId" class="form-select">
                                                    <option selected
                                                        value="{{ strtoupper(Auth::user()->id) }}">
                                                        {{ strtoupper(Auth::user()->identity) }}-{{ $nextInvoiceNumber }}
                                                    </option>
                                                    @foreach ($identities as $identity)
                                                        <option value="{{ strtoupper($identity['id']) }}">{{ strtoupper($identity['identity']) }}-{{ $nextInvoiceNumber }}</option>
                                                    @endforeach
                                                </select>
                                            @elseif(auth()->user()->role == 1)
                                            <select  name="invoice_id" id="invoiceId" class="form-select">
                                                <option selected
                                                    value="{{ strtoupper(Auth::user()->id) }}">
                                                    {{ strtoupper(Auth::user()->identity) }}-{{ $nextInvoiceNumber }}
                                                </option>

                                            </select>

                                            @endif
                                            </div>
                                        </dd>
                                        <dt class="col-sm-6 mb-2 d-md-flex align-items-center justify-content-end">
                                            <span class="fw-normal">Date:</span>
                                        </dt>
                                        <dd class="col-sm-6">
                                            <input type="text" class="form-control date-picker" name="date"
                                                value="{{ old('date') }}" placeholder="YYYY-MM-DD" />
                                        </dd>
                                        <dt class="col-sm-6 mb-2 d-md-flex align-items-center justify-content-end">
                                            <span class="fw-normal">Job Number:</span>
                                        </dt>
                                        <dd class="col-sm-6">
                                            <div class="input-group input-group-merge ">
                                                <span class="input-group-text">#</span>
                                                <input type="text" name="job_number" value="{{ old('job_number') }}"
                                                    class="form-control" id="jobNumber" />
                                            </div>
                                        </dd>
                                        <dt class="col-sm-6 mb-2 d-md-flex align-items-center justify-content-end">
                                            <span class="fw-normal">Customer ID:</span>
                                        </dt>
                                        <dd class="col-sm-6">
                                            <div class="input-group input-group-merge disabled">
                                                <span class="input-group-text">#</span>
                                                <input type="text" class="form-control d-bg"
                                                    value="{{ old('customer_id') }}" readonly name="customer_id"
                                                    id="customer_id" />
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <div class="d-flex justify-content-between flex-wrap">

                                <div class="row w-100">
                                    <div class="col-6 vertical-line line pr-100">
                                        <h6 class="pb-2">Sender Details:</h6>
                                        <input type="hidden" id="sender_id" name="sender_id" value="{{ $sender->id }}">
                                        <p id="senderDetails" class="mb-1">
                                            <b>Name: </b> {{ $sender->firstname }} {{ $sender->lastname }} <br>
                                            <b>Address: </b> {{ $sender->address }} <br>
                                            <b>Postcode: </b> {{ $sender->postcode }} <br>
                                            <b>Email: </b> {{ $sender->email }} <br>
                                            <b>Contact: </b> {{ $sender->contact }} <br>
                                            <b>Country: </b> {{ $sender->country }} <br>
                                        </p>
                                        <br>
                                        {{-- <a href="{{ route('copy.customer', ['customer_id' => $sender->id]) }}"
                                            type="button" class="btn btn-sm btn-warning" data-repeater-create>
                                            <i class="mdi mdi-plus me-1"></i> Add as a Customer
                                        </a> --}}
                                    </div>
                                    <div class="col-6 pr-100">
                                        <h6 class="pb-2">Consignee Details:</h6>
                                        <input type="hidden" id="receiver_id" name="receiver_id"
                                            value="{{ $receiver->id }}">
                                        <p id="receiverDetails" class="mb-1" <b>Name: </b> {{ $receiver->firstname }}
                                            {{ $receiver->lastname }} <br>
                                            <b>Address: </b> {{ $receiver->address }} <br>
                                            <b>Postcode: </b> {{ $receiver->postcode }} <br>
                                            <b>Email: </b> {{ $receiver->email }} <br>
                                            <b>Contact: </b> {{ $receiver->contact }} <br>
                                            <b>Country: </b> {{ $receiver->country }} <br>
                                        </p>
                                        <br>
                                        {{-- <a href="{{ route('copy.customer', ['customer_id' => $receiver->id]) }}"
                                            type="button" class="btn btn-sm btn-warning" data-repeater-create>
                                            <i class="mdi mdi-plus me-1"></i> Add as a Customer
                                        </a> --}}
                                    </div>
                                </div>



                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">


                            </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <div class="source-item pt-1">
                                <div class="repeater">
                                    <div class="mb-3" data-repeater-list="items">
                                        <div class="repeater-wrapper pt-0 pt-md-4" data-repeater-item>
                                            <div class="d-flex border rounded position-relative pe-0">
                                                <div class="row w-100 p-3">
                                                    <div class="col-md-5 col-12 mb-md-0 mb-3">
                                                        <p class="mb-2 repeater-title">Item (CM)</p>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <input type="number" name="items[0][width]"
                                                                    class="form-control width-input" placeholder="Width"
                                                                    value="{{ $booking->width }}" />
                                                            </div>
                                                            <div class="col">
                                                                <input type="number" name="items[0][height]"
                                                                    class="form-control height-input" placeholder="Height"
                                                                    value="{{ $booking->height }}" />
                                                            </div>
                                                            <div class="col">
                                                                <input type="number" name="items[0][length]"
                                                                    class="form-control length-input" placeholder="Length"
                                                                    value="{{ $booking->length }}" />
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6 col-12 mb-md-0 mb-3">
                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="mb-2 repeater-title">Volume Weight</p>
                                                                <input type="text" name="items[0][volume_weight]"
                                                                    class="form-control invoice-volume-weight mb-2 d-bg"
                                                                    placeholder="00" readonly />
                                                            </div>
                                                            <div class="col">
                                                                <p class="mb-2 repeater-title">Unit Price (£)</p>
                                                                <input type="text" name="items[0][unit_price]"
                                                                    class="form-control price-input mb-2"
                                                                    placeholder="00" />
                                                            </div>
                                                            <div class="col">
                                                                <p class="mb-2 repeater-title">Weight (KG)</p>
                                                                <input type="number" name="items[0][weight]" step=".01"
                                                                    class="form-control weight-input" placeholder="0"
                                                                    value="{{ $booking->weight }}" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-1 col-12 pe-0">
                                                        <p class="mb-2 repeater-title">Price (£)</p>
                                                        <input type="text" name="items[0][price]"
                                                            class="form-control total-display d-bg" readonly
                                                            placeholder="£0.00" />
                                                        {{-- <p class="mb-0 total-display">£0.00</p> --}}
                                                    </div>
                                                </div>

                                                <div
                                                    class="d-flex flex-column align-items-center justify-content-between border-start p-2">
                                                    <i class="mdi mdi-close cursor-pointer" data-repeater-delete></i>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-sm btn-primary" data-repeater-create>
                                            <i class="mdi mdi-plus me-1"></i> Add Item
                                        </button>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12 col-12 mb-md-0 mb-3">
                                        <div class="row">

                                            <div class="col">
                                                <p class="mb-2 repeater-title">Collection & Delivery</p>
                                                <input type="number" name="collection_fee" class="form-control mb-2" step=".01"
                                                    value="{{ old('collection_fee', '0.00') }}" id="collection-input"
                                                    onkeyup="calculateTotal()" placeholder="0" />
                                            </div>
                                            <div class="col">
                                                <p class="mb-2 repeater-title">Choose Option</p>
                                                <div class="row">
                                                    <div class="col">
                                                        <select name="invoice_option" id="invoice_option" class="form-select">
                                                            <option selected value="Other">Other</option>
                                                            <option value="Repacking">Repacking</option>
                                                            <option value="Discount">Discount</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <input type="number" name="handling_fee" class="form-control" step=".01"
                                                    value="{{ old('handling_fee', '0.00') }}" id="handling-input"
                                                    onkeyup="calculateTotal()" placeholder="0" />
                                                    </div>

                                                </div>

                                            </div>

                                            {{-- <div class="col">
                                                <p class="mb-2 repeater-title">Other</p>
                                                <input type="number" name="handling_fee" class="form-control" step=".01"
                                                    value="{{ old('handling_fee', '0.00') }}" id="handling-input"
                                                    onkeyup="calculateTotal()" placeholder="0" />
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>


                        <hr class="my-0" />
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-md-0 mb-3">
                                    <h5>Bank Details</h5>
                                    <div class="row">
                                        <div class="col">
                                            <p class="mb-0"><b>Bank:</b> HSBC</p>
                                            <p><b>A/C Name:</b> C.ON Cargo Ltd</p>
                                        </div>
                                        <div class="col">
                                            <p class="mb-0"><b>Sort Code:</b> 40-20-23</p>
                                            <p><b>A/C Name:</b> 22349345</p>
                                        </div>
                                    </div>
                                    <ul>
                                        <li>Insuarance Policy Maximum Cover £50</li>
                                    </ul>
                                </div>
                                <div class="col-md-6 d-flex justify-content-md-end mt-2">
                                    <div class="invoice-calculations">


                                        <div class="d-flex justify-content-between mb-2">
                                            <div class="row">
                                                <div class="col d-flex justify-content-end align-items-end">
                                                    <div class="content">
                                                        <h3 class="w-px-150 total-text">Total (£):</h3>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <input type="text" name="total_fee" readonly
                                                        class="form-control d-bg total-font" id="fullamount"
                                                        placeholder="£0.00" />
                                                </div>
                                            </div>


                                            {{-- <h3 class="mb-0 pt-1" id="fullamount">£0.00</h3> --}}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="note" class="form-label fw-medium text-heading">Note:</label>
                                        <textarea class="form-control" name="note" rows="2" id="note" placeholder="Invoice note"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- /Invoice Add-->

            <!-- Invoice Actions -->
            <div class="col-lg-3 col-12 invoice-actions">
                <div class="card mb-4">
                    <div class="card-body">
                        {{-- <button type="button" class="btn btn-outline-secondary d-grid w-100 mb-3" data-bs-toggle="offcanvas"
                            data-bs-target="#sendInvoiceOffcanvas">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                    class="mdi mdi-send-outline scaleX-n1-rtl me-2"></i>Send Invoice</span>
                        </button> --}}

                        {{-- <button type="submit" name="action" value="preview" class="btn btn-lg btn-outline-secondary d-grid w-100 mb-3">Save & Preview</button> --}}
                        <button type="submit" name="action" value="save"
                            class="btn btn-lg btn-primary d-grid w-100 mb-3">Save</button>
                        <button name="action" value="preview" class="btn btn-outline-secondary d-grid w-100">Save &
                            Preview</button>
                    </div>
                </div>
                </form>

                <div class="card mb-4">
                    <div class="card-body">
                        <label for="selectCustomer">&nbsp;&nbsp;Select Customer:</label>
                        <select id="selectCustomer" class="select2 form-select form-select-lg" data-allow-clear="true">
                            <option value="" data-address="">Select a Customer</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}" data-id="{{ $customer->id }}">
                                    {{ $customer->firstname }}
                                    {{ $customer->lastname }} - {{ $customer->address }}
                                </option>
                            @endforeach
                        </select>
                        <hr>
                        <label for="selectSender">&nbsp;&nbsp;Select Sender:</label>
                        <select id="selectSender" class="select2 form-select form-select-lg" data-allow-clear="true">
                            <option value="" data-address="">Select a Sender</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}" data-id="{{ $customer->id }}"
                                    data-id="{{ $customer->id }}"
                                    data-name="{{ $customer->firstname }} {{ $customer->lastname }}"
                                    data-address="{{ $customer->address }}" data-postcode="{{ $customer->postcode }}"
                                    data-email="{{ $customer->email }}" data-contact="{{ $customer->contact }}"
                                    data-country="{{ $customer->country }}">{{ $customer->firstname }}
                                    {{ $customer->lastname }} - {{ $customer->address }}
                                </option>
                            @endforeach
                        </select>

                        <hr>

                        <label for="selectReceiver">&nbsp;&nbsp;Select Receiver:</label>
                        <select id="selectReceiver" class="select2 form-select form-select-lg" data-allow-clear="true">
                            <option value="" data-address="">Select a Receiver</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}" data-id="{{ $customer->id }}"
                                    data-id="{{ $customer->id }}"
                                    data-name="{{ $customer->firstname }} {{ $customer->lastname }}"
                                    data-address="{{ $customer->address }}" data-postcode="{{ $customer->postcode }}"
                                    data-email="{{ $customer->email }}" data-contact="{{ $customer->contact }}"
                                    data-country="{{ $customer->country }}">{{ $customer->firstname }}
                                    {{ $customer->lastname }} - {{ $customer->address }}
                                </option>
                            @endforeach
                        </select>

                        <hr>

                        <button type="button" class="btn btn-danger w-100 btn-lg" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd"><span
                                class="mdi mdi-plus"></span> &nbsp;Add Customer</button>

                    </div>
                </div>

                @include('backend.components.alert')


            </div>
            <!-- /Invoice Actions -->
        </div>

        <!-- Offcanvas -->
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

        <!-- /Offcanvas -->
    </div>
    <!-- / Content -->
@endsection
@push('vendorsjs')
    <script src="{{ asset('backend/assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
@endpush


@push('pagejs')
    <script src="{{ asset('backend/assets/js/forms-selects.js') }}"></script>
    <script src="{{ asset('backend/assets/js/offcanvas-send-invoice.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app-invoice-add.js') }}"></script>
    {{-- <script src="{{ asset('backend/assets/js/forms-tagify.js') }}"></script>
<script src="{{ asset('backend/assets/js/forms-typeahead.js') }}"></script> --}}
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            // Initialize Select2
            $('#selectCustomer').select2();
            $('#selectSender').select2();
            $('#selectReceiver').select2();


            $('#selectCustomer').on('select2:select', function(e) {
                var data = e.params.data;
                var id = $(data.element).data('id');

                $('#customer_id').val(id);

            });
            $('#selectSender').on('select2:select', function(e) {
                var data = e.params.data;
                var id = $(data.element).data('id');
                var name = $(data.element).data('name');
                var address = $(data.element).data('address');
                var postcode = $(data.element).data('postcode');
                var email = $(data.element).data('email');
                var contact = $(data.element).data('contact');
                var country = $(data.element).data('country');

                $('#sender_id').val(id);
                $('#senderDetails').html(
                    `<b>Name:</b> ${name}<br><b>Address:</b> ${address}<br><b>Postcode:</b> ${postcode}<br><b>Email:</b> ${email}<br><b>Contact:</b> ${contact}<br><b>Country:</b> ${country}`
                );
            });
            $('#selectReceiver').on('select2:select', function(e) {
                var data = e.params.data;
                var id = $(data.element).data('id');
                var name = $(data.element).data('name');
                var address = $(data.element).data('address');
                var postcode = $(data.element).data('postcode');
                var email = $(data.element).data('email');
                var contact = $(data.element).data('contact');
                var country = $(data.element).data('country');

                $('#receiver_id').val(id);
                $('#receiverDetails').html(
                    `<b>Name:</b> ${name}<br><b>Address:</b> ${address}<br><b>Postcode:</b> ${postcode}<br><b>Email:</b> ${email}<br><b>Contact:</b> ${contact}<br><b>Country:</b> ${country}`
                );
            });


            // Initialize the repeater
            $('.repeater').repeater({
                show: function() {
                    $(this).slideDown();
                    calculateTotal(); // Recalculate totals when a new item is added
                },
                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                    calculateTotal(); // Recalculate totals when an item is deleted
                }
            });

            // Recalculate totals when any input changes
            $(document).on('input', '.repeater input', function() {
                calculateTotal();
            });



        });

        function calculateTotal() {
            let fullAmount = 0;
            $('.repeater [data-repeater-item]').each(function() {
                let width = parseFloat($(this).find('.width-input').val()) || 0;
                let height = parseFloat($(this).find('.height-input').val()) || 0;
                let length = parseFloat($(this).find('.length-input').val()) || 0;
                let weight = parseFloat($(this).find('.weight-input').val()) || 0;
                let price = parseFloat($(this).find('.price-input').val()) || 0;

                let volume = (width * height * length) / 5000; // Example calculation
                $(this).find('.invoice-volume-weight').val(volume.toFixed(
                    2)); // Display the Volume Weight in the input

                // Compare weight input and volume input
                if (volume > weight) {
                    let total = volume * price;
                    fullAmount += total;
                    $(this).find('.total-display').val(total.toFixed(2));
                } else if (volume < weight) {
                    let total = weight * price;
                    fullAmount += total;
                    $(this).find('.total-display').val(total.toFixed(2));
                } else {
                    let total = volume * price;
                    fullAmount += total;
                    $(this).find('.total-display').val(total.toFixed(2));
                }
            });
            let collection = parseFloat($('#collection-input').val()) || 0;
            let handling = parseFloat($('#handling-input').val()) || 0;
            fullAmount += collection + handling;
            $('#fullamount').val(fullAmount.toFixed(2));
        }
    </script>
@endpush
