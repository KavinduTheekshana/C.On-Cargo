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
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <div class="row mx-0">
                            <div class="col-md-7 mb-md-0 mb-4 ps-0">
                                <div class="d-flex svg-illustration align-items-center gap-2 mb-4">
                                    <span class="app-brand-logo demo">
                                        <img width="140px" src="{{ asset('frontend/assets/img/logo/logo.svg') }}"
                                            alt="" />
                                    </span>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 vertical-line line">
                                        <p class="mb-1"><b>C.On Group Ltd</b></p>
                                        <p class="mb-1">12 King Arthur Ct, Waltham Cross, London, EN8 8EH</p>
                                        <p class="mb-1">uk@concargo.co.uk</p>
                                        <p class="mb-0">+44 75 032 88 488</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-1"><b>C.On Cargo Ltd</b></p>
                                        <p class="mb-1">184/B, Moratuwa Road, Piliyandala, Sri Lanka</p>
                                        <p class="mb-1">sl@concargo.co.uk</p>
                                        <p class="mb-0">+94 76 699 66 52</p>
                                    </div>
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
                                            <input type="text" class="form-control" disabled id="invoiceId" />
                                        </div>
                                    </dd>
                                    <dt class="col-sm-6 mb-2 d-md-flex align-items-center justify-content-end">
                                        <span class="fw-normal">Date:</span>
                                    </dt>
                                    <dd class="col-sm-6">
                                        <input type="text" class="form-control date-picker" placeholder="YYYY-MM-DD" />
                                    </dd>
                                    <dt class="col-sm-6 mb-2 d-md-flex align-items-center justify-content-end">
                                        <span class="fw-normal">Job Number:</span>
                                    </dt>
                                    <dd class="col-sm-6">
                                        <div class="input-group input-group-merge ">
                                            <span class="input-group-text">#</span>
                                            <input type="text" class="form-control"
                                                id="jobNumber" />
                                        </div>
                                    </dd>
                                    <dt class="col-sm-6 mb-2 d-md-flex align-items-center justify-content-end">
                                        <span class="fw-normal">Customer ID:</span>
                                    </dt>
                                    <dd class="col-sm-6">
                                        <div class="input-group input-group-merge ">
                                            <span class="input-group-text">#</span>
                                            <input type="text" class="form-control"
                                                id="customerId" />
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
                                    <p id="senderDetails" class="mb-1"></p>
                                </div>
                                <div class="col-6 pr-100">
                                    <h6 class="pb-2">Receiver Details:</h6>
                                    <p id="receiverDetails" class="mb-1"></p>
                                </div>
                            </div>






                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form class="source-item pt-1">
                            <div class="repeater">
                                <div class="mb-3" data-repeater-list="group-a">
                                    <div class="repeater-wrapper pt-0 pt-md-4" data-repeater-item>
                                        <div class="d-flex border rounded position-relative pe-0">
                                            <div class="row w-100 p-3">
                                                <div class="col-md-5 col-12 mb-md-0 mb-3">
                                                    <p class="mb-2 repeater-title">Item (CM)</p>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <input type="number" class="form-control width-input"
                                                                placeholder="Width" />
                                                        </div>
                                                        <div class="col">
                                                            <input type="number" class="form-control height-input"
                                                                placeholder="Height" />
                                                        </div>
                                                        <div class="col">
                                                            <input type="number" class="form-control length-input"
                                                                placeholder="Length" />
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6 col-12 mb-md-0 mb-3">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="mb-2 repeater-title">Volume Weight</p>
                                                            <input type="text"
                                                                class="form-control invoice-volume-weight mb-2" disabled
                                                                placeholder="00" />
                                                        </div>
                                                        <div class="col">
                                                            <p class="mb-2 repeater-title">Unit Price (£)</p>
                                                            <input type="text" class="form-control price-input mb-2"
                                                                placeholder="00" />
                                                        </div>
                                                        <div class="col">
                                                            <p class="mb-2 repeater-title">Weight (KG)</p>
                                                            <input type="number" class="form-control weight-input"
                                                                placeholder="0" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-1 col-12 pe-0">
                                                    <p class="mb-2 repeater-title">Price</p>
                                                    <p class="mb-0 total-display">£0.00</p>
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
                                            <input type="number" class="form-control mb-2" id="collection-input"
                                                onkeyup="calculateTotal()" placeholder="0" />
                                        </div>
                                        <div class="col">
                                            <p class="mb-2 repeater-title">Handling Fee</p>
                                            <input type="number" class="form-control" id="handling-input"
                                                onkeyup="calculateTotal()" placeholder="0" />
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>

                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-md-0 mb-3">
                               <h5>Bank Details</h5>
                               <div class="row">
                                <div class="col">
                                    <p class="mb-0"><b>Bank:</b> HSBC</p>
                                    <p><b>A/C Name:</b> C.On Cargo Ltd</p>
                                </div>
                                <div class="col">
                                    <p class="mb-0"><b>Sort Code:</b> 40-20-23</p>
                                    <p><b>A/C Name:</b> 22349345</p>
                                </div>
                               </div>
                             <ul><li>Insuarance Policy Maximum Cover £50</li></ul>
                            </div>
                            <div class="col-md-6 d-flex justify-content-md-end mt-2">
                                <div class="invoice-calculations">


                                    <div class="d-flex justify-content-between mb-2">
                                        <h3 class="w-px-150">Total:</h3>
                                        <h3 class="mb-0 pt-1" id="fullamount">£0.00</h3>
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
                                    <textarea class="form-control" rows="2" id="note" placeholder="Invoice note"></textarea>
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
                        <button class="btn btn-primary d-grid w-100 mb-3" data-bs-toggle="offcanvas"
                            data-bs-target="#sendInvoiceOffcanvas">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                    class="mdi mdi-send-outline scaleX-n1-rtl me-2"></i>Send Invoice</span>
                        </button>
                        <a href="./app-invoice-preview.html"
                            class="btn btn-outline-secondary d-grid w-100 mb-3">Preview</a>
                        <button type="button" class="btn btn-outline-secondary d-grid w-100">Save</button>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="form-floating form-floating-outline mb-4">
                        <select class="form-select bg-body mb-4" id="select-payment-add">
                            <option value="Bank Account">Bank Account</option>
                            <option value="Paypal">Paypal</option>
                            <option value="Card">Credit/Debit Card</option>
                            <option value="UPI Transfer">UPI Transfer</option>
                        </select>
                        <label for="select-payment-add" class="bg-body">Accept payments via</label>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <label for="payment-terms" class="mb-0">Payment Terms</label>
                        <label class="switch switch-primary me-0">
                            <input type="checkbox" class="switch-input" id="payment-terms" checked />
                            <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                            </span>
                            <span class="switch-label"></span>
                        </label>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <label for="client-notes" class="mb-0">Client Notes</label>
                        <label class="switch switch-primary me-0">
                            <input type="checkbox" class="switch-input" id="client-notes" />
                            <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                            </span>
                            <span class="switch-label"></span>
                        </label>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label for="payment-stub" class="mb-0">Payment Stub</label>
                        <label class="switch switch-primary me-0">
                            <input type="checkbox" class="switch-input" id="payment-stub" />
                            <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                            </span>
                            <span class="switch-label"></span>
                        </label>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <label for="selectSender">&nbsp;&nbsp;Select Sender:</label>
                        <select id="selectSender" class="select2 form-select form-select-lg" data-allow-clear="true">
                            <option value="" data-address="">Select a Sender</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}"
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
                                <option value="{{ $customer->id }}"
                                    data-name="{{ $customer->firstname }} {{ $customer->lastname }}"
                                    data-address="{{ $customer->address }}" data-postcode="{{ $customer->postcode }}"
                                    data-email="{{ $customer->email }}" data-contact="{{ $customer->contact }}"
                                    data-country="{{ $customer->country }}">{{ $customer->firstname }}
                                    {{ $customer->lastname }} - {{ $customer->address }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
            <!-- /Invoice Actions -->
        </div>

        <!-- Offcanvas -->
        <!-- Send Invoice Sidebar -->
        <div class="offcanvas offcanvas-end" id="sendInvoiceOffcanvas" aria-hidden="true">
            <div class="offcanvas-header mb-3">
                <h5 class="offcanvas-title">Send Invoice</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body flex-grow-1">
                <form>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="invoice-from" value="shelbyComapny@email.com"
                            placeholder="company@email.com" />
                        <label for="invoice-from">From</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="invoice-to" value="qConsolidated@email.com"
                            placeholder="company@email.com" />
                        <label for="invoice-to">To</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="invoice-subject"
                            value="Invoice of purchased Admin Templates" placeholder="Invoice regarding goods" />
                        <label for="invoice-subject">Subject</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <textarea class="form-control" name="invoice-message" id="invoice-message" style="height: 190px">
    Dear Queen Consolidated,
        Thank you for your business, always a pleasure to work with you!
        We have generated a new invoice in the amount of $95.59
        We would appreciate payment of this invoice by 05/11/2021</textarea>
                        <label for="invoice-message">Message</label>
                    </div>
                    <div class="mb-4">
                        <span class="badge bg-label-primary rounded-pill">
                            <i class="mdi mdi-link-variant mdi-14px me-1"></i>
                            <span class="align-middle">Invoice Attached</span>
                        </span>
                    </div>
                    <div class="mb-3 d-flex flex-wrap">
                        <button type="button" class="btn btn-primary me-3" data-bs-dismiss="offcanvas">Send</button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /Send Invoice Sidebar -->

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
            $('#selectSender').select2();
            $('#selectReceiver').select2();

            $('#selectSender').on('select2:select', function(e) {
                var data = e.params.data;
                var name = $(data.element).data('name');
                var address = $(data.element).data('address');
                var postcode = $(data.element).data('postcode');
                var email = $(data.element).data('email');
                var contact = $(data.element).data('contact');
                var country = $(data.element).data('country');

                $('#senderDetails').html(
                    `<b>Name:</b> ${name}<br><b>Address:</b> ${address}<br><b>Postcode:</b> ${postcode}<br><b>Email:</b> ${email}<br><b>Contact:</b> ${contact}<br><b>Country:</b> ${country}`
                );
            });
            $('#selectReceiver').on('select2:select', function(e) {
                var data = e.params.data;
                var name = $(data.element).data('name');
                var address = $(data.element).data('address');
                var postcode = $(data.element).data('postcode');
                var email = $(data.element).data('email');
                var contact = $(data.element).data('contact');
                var country = $(data.element).data('country');

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
                    $(this).find('.total-display').text(total.toFixed(2));
                } else if (volume < weight) {
                    let total = weight * price;
                    fullAmount += total;
                    $(this).find('.total-display').text(total.toFixed(2));
                } else {
                    let total = volume * price;
                    fullAmount += total;
                    $(this).find('.total-display').text(total.toFixed(2));
                }
            });
            let collection = parseFloat($('#collection-input').val()) || 0;
            let handling = parseFloat($('#handling-input').val()) || 0;
            fullAmount += collection + handling;
            $('#fullamount').text(fullAmount.toFixed(2));
        }
    </script>
@endpush
