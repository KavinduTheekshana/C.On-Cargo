@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/flatpickr/flatpickr.css') }}" />
@endpush
@extends('layouts.backend')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tracking /</span> List</h4>

        <!-- Invoice List Widget -->



        <!-- Invoice List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Tracking Table</h5>
                    </div>
                    <form id="filterForm" class="mb-3">
                        <div class="col d-flex">


                            <div class="form-floating form-floating-outline">
                                <input type="text" class="form-control" value="{{ old('start_date') }}"
                                    placeholder="YYYY-MM-DD" id="flatpickr-date" name="start_date" required />
                                <label for="flatpickr-date">From Date</label>
                            </div>

                            <div class="form-floating form-floating-outline" style="margin-left: 20px !important;">
                                <input type="text" class="form-control" placeholder="YYYY-MM-DD"
                                    value="{{ old('end_date') }}" id="flatpickr-date2" name="end_date" required />
                                <label for="flatpickr-date">To Date</label>
                            </div>

                            <div class="form-floating form-floating-outline" style="margin-left: 20px !important;">
                                <select name="from_country" id="from_country" class="select form-select">
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="France">France</option>
                                    <option value="India">India</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Canada">Canada</option>
                                </select>
                                <label for="flatpickr-date">Send Country</label>
                            </div>

                            <div class="form-floating form-floating-outline" style="margin-left: 20px !important;">
                                <select name="to_country" id="to_country" class="select form-select">
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="France">France</option>
                                    <option value="India">India</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Canada">Canada</option>
                                </select>
                                <label for="flatpickr-date">Recieve Country</label>
                            </div>





                        </div>

                        <div class="mt-3">
                        <button type="submit" class="btn btn-lg btn-warning">Filter</button>
                        <button id="btn_update" type="button" data-bs-toggle="modal" data-bs-target="#referAndEarn"
                            class="btn btn-lg btn-dark ml-20">Update Tracking Group</button>
                        </div>
                    </form>

                </div>
            </div>

            {{-- modal  --}}
            <div class="modal fade" id="referAndEarn" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-refer-and-earn">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body pt-3 pt-md-0 px-0 pb-md-0">

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">Update Tracking Information</h3>
                            </div>

                            <div id="responseMessage" class="alert d-none" role="alert">
                            </div>
                            <br>

                            <form id="editTrackingForm" class="row g-4" onsubmit="return false">
                                @csrf
                                <div class="col-12 col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" id="fromDateModule" placeholder="YYYY-MM-DD"
                                            name="fromDateModule" class="form-control" />
                                        <label for="fromDateModule">From Date</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" id="toDateModule" placeholder="YYYY-MM-DD"
                                            name="toDateModule" class="form-control" />
                                        <label for="toDateModule">To Date</label>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <select name="send_country" id="from_country2" class="select form-select">
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="France">France</option>
                                            <option value="India">India</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Canada">Canada</option>
                                        </select>
                                        <label for="fromDateModule">Send Country</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <select name="recieve_country" id="to_country2" class="select form-select">
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="France">France</option>
                                            <option value="India">India</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Canada">Canada</option>
                                        </select>
                                        <label for="toDateModule">Recieve Country</label>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="form-floating form-floating-outline">
                                        <select id="stopid" name="stopid" class="form-select"
                                            aria-label="Default select example">
                                            <option value="1">Dispatched</option>
                                            <option value="2">In transit</option>
                                            <option value="3">Out for delivery</option>
                                            <option value="4">Estimated delivary</option>
                                        </select>
                                        <label for="stopid">Status</label>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" id="departed_at" placeholder="YYYY-MM-DD"
                                            name="departed_at" class="form-control" />
                                        <label for="departed_at">Departed At</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" id="arrived_at" placeholder="YYYY-MM-DD" name="arrived_at"
                                            class="form-control" />
                                        <label for="arrived_at">Arrived At</label>
                                    </div>
                                </div>




                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- modal  --}}
            <div class="card-datatable table-responsive">
                <table id="invoice" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Invoice ID</th>
                            <th>Invoice Date</th>
                            <th>Sender Details</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody id="invoiceBody">

                    </tbody>
                </table>
            </div>

            {{-- modal view button --}}
            <div class="modal fade" id="addNewAddress" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body p-md-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            {{-- Invoice  --}}
                            <div class="row">
                                <div class="col-5">
                                    <div id="fleet1" class="accordion-collapse collapse show" data-bs-parent="#fleet">
                                        <div class="accordion-body pt-3 pb-0">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h4 class="mb-1">Delivery Process</h4>

                                            </div>

                                            <ul class="timeline ps-3 mt-4 timeline-font">
                                                <li class="timeline-item ps-4 border-left-dashed">
                                                    <span id="iconDispatched"
                                                        class="timeline-indicator-advanced border-0 shadow-none">
                                                        <i class="mdi mdi-check-circle-outline"></i>
                                                    </span>
                                                    <div class="timeline-event ps-1 pb-2">
                                                        <div class="timeline-header">
                                                            <small id="textDispatched"
                                                                class="text-uppercase me-0">Dispatched</small>
                                                        </div>
                                                        {{-- <h6 class="mb-1">Veronica Herman</h6> --}}
                                                        <p class="mb-0 small" id="modalInvoiceDispatched"></p>
                                                    </div>
                                                </li>
                                                <li class="timeline-item ps-4 border-left-dashed">
                                                    <span id="iconTransit"
                                                        class="timeline-indicator-advanced border-0 shadow-none">
                                                        <i class="mdi mdi-check-circle-outline"></i>
                                                    </span>
                                                    <div class="timeline-event ps-1 pb-2">
                                                        <div class="timeline-header">
                                                            <small id="textTransit" class="text-uppercase">In
                                                                Transit</small>
                                                        </div>
                                                        {{-- <h6 class="mb-1">Veronica Herman</h6>
                                                        <p class="mb-0">Sep 03, 8:02 AM</p> --}}
                                                    </div>
                                                </li>
                                                <li class="timeline-item ps-4 border-left-dashed">
                                                    <span id="iconDelivary"
                                                        class="timeline-indicator-advanced border-0 shadow-none">
                                                        <i class="mdi mdi-check-circle-outline"></i>
                                                    </span>
                                                    <div class="timeline-event ps-1 pb-2">
                                                        <div class="timeline-header">
                                                            <small id="textDelivary" class="text-uppercase">out for
                                                                delivery</small>
                                                        </div>
                                                        {{-- <h6 class="mb-1">Veronica Herman</h6>
                                                        <p class="mb-0">Sep 03, 8:02 AM</p> --}}
                                                    </div>
                                                </li>
                                                <li class="timeline-item ps-4 border-transparent">
                                                    <span id="iconArrivel"
                                                        class="timeline-indicator-advanced text-primary border-0 shadow-none">
                                                        <i class="mdi mdi-map-marker-outline"></i>
                                                    </span>
                                                    <div class="timeline-event ps-1 pb-2">
                                                        <div class="timeline-header">
                                                            <small id="textArrivel" class="text-uppercase">Estimeted
                                                                Delivery</small>
                                                        </div>
                                                        {{-- <h6 class="mb-1">Veronica Herman</h6> --}}
                                                        <p class="mb-0 small" id="modalInvoiceArrivel"></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="pl-12-custom">
                                        <h6>Invoice ID : <span id="modalInvoiceId"></span></h6>
                                        <h6>Invoice Date : <span id="modalInvoiceDate"></span></h6>
                                        <h6>Job Number : <span id="modalInvoiceJobNumber"></span></h6>
                                        <h6>Cuatomer ID : <span id="modalInvoiceCustomerId"></span></h6>
                                        <h6 class="m-0">Sender Details :</h6>
                                        <p id="modalInvoiceSenderDetails"></p>
                                        <h6 class="m-0">Receiver Details :</h6>
                                        <p id="modalInvoiceReceiverDetails"></p>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{-- modal view button --}}
        </div>
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
    <script src="{{ asset('backend/assets/js/forms-pickers.js') }}"></script>
@endpush

@push('scripts')
    <script>
        // datatable
        $(document).ready(function() {
            $('#invoice').DataTable({});
        });



        $(document).ready(function() {
            $('#editTrackingForm').submit(function(e) {
                e.preventDefault(); // Prevent the default form submit

                $.ajax({
                    url: "{{ route('track.invoice') }}", // Laravel route
                    type: "POST",
                    data: $(this).serialize(), // Serialize form data
                    success: function(response) {
                        // Handle success (you might want to redirect, display a message, etc.)
                        console.log(response.message);
                        if (response.message == "1") {
                            $('#responseMessage')
                                .html(
                                    "Please provide both departure and arrival times for new tracking records."
                                )
                                .removeClass('alert-success d-none') // Set the message text
                                .addClass(
                                    'alert-danger') // Add class for styling success messages
                                .show(); // Make the message visible
                        } else {
                            $('#responseMessage')
                                .html(
                                    "Tracking data processed successfully for invoices within date range"
                                )
                                .removeClass('alert-danger d-none') // Set the message text
                                .addClass(
                                    'alert-success') // Add class for styling success messages
                                .show(); // Make the message visible
                        }

                        fetchAndDisplayInvoices();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        console.error("Error:", error);
                    }
                });
            });
        });


        function fetchAndDisplayInvoices() {
            var fromdate = $('#flatpickr-date').val();
            var todate = $('#flatpickr-date2').val();

            $.ajax({
                url: '{{ route('filter.invoices') }}',
                type: 'GET',
                data: {
                    start_date: fromdate,
                    end_date: todate
                },
                success: function(response) {
                    $('#invoiceBody').empty(); // Clear existing rows
                    response.invoices.forEach(function(invoice) {
                        let status = getStatusBadge(invoice);
                        let row = `<tr>
                <td>${invoice.invoice_id}</td>
                <td>${invoice.invoice_date}</td>
                <td><b>${invoice.sender_first_name} ${invoice.sender_last_name}</b><br>${invoice.sender_address}</td>
                <td>${status}</td>
                <td>£${invoice.invoice_amount}</td>
                <td>
                                <button type="button"
                                    class="btn btn-icon btn-dark btn-fab demo waves-effect waves-light m-1 preview-btn"
                                    data-bs-toggle="modal" title="View Invoice" data-invoice-id="${invoice.id}"
                                    data-bs-target="#addNewAddress">
                                    <i class="tf-icons mdi mdi-eye-outline"></i>
                                </button>
                    </td>
            </tr>`;
                        $('#invoiceBody').append(row);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        $(document).ready(function() {
            $('#filterForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('filter.invoices') }}',
                    type: 'GET',
                    data: $(this).serialize(),
                    success: function(response) {
                        // console.log(response);
                        $('#invoiceBody').empty(); // Clear existing rows
                        response.invoices.forEach(function(invoice) {
                            let status = getStatusBadge(invoice);
                            let row = `<tr>
                            <td>${invoice.invoice_id}</td>
                            <td>${invoice.invoice_date}</td>
                            <td><b>${invoice.sender_first_name} ${invoice.sender_last_name}</b><br>${invoice.sender_address}</td>
                            <td>${status}</td>
                            <td>£${invoice.invoice_amount}</td>
                            <td>
                                <button type="button"
                                    class="btn btn-icon btn-dark btn-fab demo waves-effect waves-light m-1 preview-btn"
                                    data-bs-toggle="modal" title="View Invoice" data-invoice-id="${invoice.id}"
                                    data-bs-target="#addNewAddress">
                                    <i class="tf-icons mdi mdi-eye-outline"></i>
                                </button>
                    </td>
                        </tr>`;
                            $('#invoiceBody').append(row);
                        });
                        $('#btn_update').removeAttr('disabled');
                        var fromdate = $('#flatpickr-date').val();
                        var todate = $('#flatpickr-date2').val();
                        var from_country = $('#from_country').val();
                        var to_country = $('#to_country').val();
                        $('#fromDateModule').val(fromdate);
                        $('#toDateModule').val(todate);
                        $('#from_country2').val(from_country);
                        $('#to_country2').val(to_country);
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        console.error(error);
                    }
                });
            });
        });

        function getStatusBadge(invoice) {
            function formatDate(dateString) {
                const date = new Date(dateString);
                const options = {
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                }; // Example format: '12 November 2023'
                return date.toLocaleDateString('en-US', options);
            }
            if (invoice.tracking_id == 1) {
                const formattedDate = formatDate(invoice.tracking_departed_at);
                return `<span class="badge bg-info">Dispatched <br> ${formattedDate}</span>`;
            } else if (invoice.tracking_id == 2) {
                return `<span class="badge bg-primary">In Transit</span>`;
            } else if (invoice.tracking_id == 3) {
                return `<span class="badge bg-warning">Out for delivery</span>`;
            } else if (invoice.tracking_id == 4) {
                const formattedDate = formatDate(invoice.tracking_arrived_at);
                return `<span class="badge bg-success">Estimate delivery <br> ${formattedDate}</span>`;
            } else if (invoice.tracking_id == null) {
                return `<span class="badge bg-dark">Not Assigned Yet</span>`;
            }
        }



        //tracking details modal
        $(document).ready(function() {
            $(document).on('click', '.preview-btn', function() {
                var invoiceId = $(this).data('invoice-id'); // Retrieve the invoice ID

                $.ajax({
                    url: '/tracking/' + invoiceId + '/details',
                    type: 'GET',
                    success: function(response) {
                        updateTrackingIconsAndTexts(response.tracking.stop_id);
                        updateModalContent(response);
                        updateFormattedDates(response.tracking);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });

            function updateTrackingIconsAndTexts(stopId) {
                var trackingStages = ['Dispatched', 'Transit', 'Delivary', 'Arrivel'];

                trackingStages.forEach(function(stage, index) {
                    var icon = $('#icon' + stage);
                    var text = $('#text' + stage);

                    if (index < stopId) {
                        icon.addClass('text-success').removeClass('text-primary');
                        text.addClass('text-success').removeClass('text-primary');
                    } else {
                        icon.removeClass('text-success text-primary');
                        text.removeClass('text-success text-primary');
                    }
                });

                // Update modalInvoiceDispatched
                if (stopId >= 1) {
                    $('#modalInvoiceDispatched').addClass('text-success').removeClass('text-primary');
                } else {
                    $('#modalInvoiceDispatched').removeClass('text-success text-primary');
                }

                // Update modalInvoiceArrivel
                if (stopId === 4) {
                    $('#modalInvoiceArrivel').addClass('text-success').removeClass('text-primary');
                } else {
                    $('#modalInvoiceArrivel').removeClass('text-success text-primary');
                }
            }


            function updateModalContent(response) {
                $('#modalInvoiceId').text(response.invoice_id);
                $('#modalInvoiceDate').text(response.date);
                $('#modalInvoiceJobNumber').text(response.job_number);
                $('#modalInvoiceCustomerId').text(response.customer_id);

                var senderDetails = formatContactDetails(response.sender);
                $('#modalInvoiceSenderDetails').html(senderDetails);

                var receiverDetails = formatContactDetails(response.receiver);
                $('#modalInvoiceReceiverDetails').html(receiverDetails);
            }

            function formatContactDetails(contact) {
                return contact.firstname + " " + contact.lastname + "<br>" +
                    contact.address + "<br>" + contact.postcode + "<br>" +
                    contact.country + "<br>" + contact.email + "<br>" + contact.contact;
            }

            function updateFormattedDates(tracking) {
                $('#modalInvoiceDispatched').text(formatDate(tracking.departed_at));
                $('#modalInvoiceArrivel').text(formatDate(tracking.arrived_at));
            }

            function formatDate(dateStr) {
                var date = new Date(dateStr);
                var day = date.getDate();
                var monthName = date.toLocaleString('default', {
                    month: 'long'
                });
                var year = date.getFullYear();
                return `${day} ${monthName}, ${year}`;
            }
        });
    </script>
@endpush
