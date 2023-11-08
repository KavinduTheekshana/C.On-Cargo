@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@extends('layouts.backend')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row invoice-preview">
            <!-- Invoice -->

            <div class="col-xl-9 col-md-8 col mb-md-0 mb-4">
                <div class="card invoice-preview-card" style="width: 210mm; height: 297mm;">
                    <div id="content-to-print" style="width: 210mm; height: 297mm;">
                        <div class="card-body pb-1">
                            <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column">
                                <div class="mb-xl-0 pb-1">

                                    <div style="width: 200px" class="mb-2">
                                        <span class="app-brand-logo demo">
                                            <img width="160px" src="{{ asset('backend/assets/svg/logo.png') }}"
                                                alt="" srcset="">
                                        </span>

                                    </div>
                                    <div class="row" style="font-size: 12px">
                                        <div class="col-md-6 vertical-line line">
                                            <p class="mb-1"><b>C.ON Group Ltd</b></p>
                                            <p class="mb-1">12 King Arthur Road, Waltham Cross, London, EN8 8EH</p>
                                            <p class="mb-1">info@concargo.co.uk</p>
                                            <p class="mb-0">+44 7503 288 488</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-1"><b>C.ON Cargo Ltd</b></p>
                                            <p class="mb-1">184/B, Moratuwa Road, Piliyandala, <br>Sri Lanka</p>
                                            <p class="mb-1">sl@concargo.co.uk</p>
                                            <p class="mb-0">+94 766 99 66 52</p>
                                        </div>
                                    </div>
                                </div>
                                <div style="font-size: 12px">
                                    <h6 class="fw-medium">INVOICE #{{ $invoice->invoice_id }}</h6>
                                    <div class="mb-1">
                                        <span>Date Issue:</span>
                                        <span>{{ $invoice->date }}</span>
                                    </div>
                                    <div>
                                        <span>Job Number:</span>
                                        <span>{{ $invoice->job_number }}</span>
                                    </div>
                                    <div>
                                        <span>Customer ID:</span>
                                        <span>{{ $invoice->customer_id }}</span>
                                    </div>

                                    <div>
                                        {!! DNS1D::getBarcodeHtml("$invoice->invoice_id", 'C128', 1.1, 60) !!}
                                        C.On Cargo {{ $invoice->invoice_id }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body" style="font-size: 12px">
                            <div class="row">
                                <div class="col-md-6 vertical-line line">
                                    <h6 class="pb-1">Sender Details:</h6>
                                    <p class="mb-1"><b>Name:</b> {{ $invoice->sender->firstname }}
                                        {{ $invoice->sender->lastname }}</p>
                                    <p class="mb-1"><b>Address:</b> {{ $invoice->sender->address }}</p>
                                    <p class="mb-1"><b>Post Code:</b> {{ $invoice->sender->postcode }}</p>
                                    <p class="mb-1"><b>Email:</b> {{ $invoice->sender->email }}</p>
                                    <p class="mb-1"><b>Contact No:</b> {{ $invoice->sender->contact }}</p>
                                    <p class="mb-1"><b>Country:</b> {{ $invoice->sender->country }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="pb-1">Consignee Details:</h6>
                                    <p class="mb-1"><b>Name:</b> {{ $invoice->receiver->firstname }}
                                        {{ $invoice->sender->lastname }}</p>
                                    <p class="mb-1"><b>Address:</b> {{ $invoice->receiver->address }}</p>
                                    <p class="mb-1"><b>Post Code:</b> {{ $invoice->receiver->postcode }}</p>
                                    <p class="mb-1"><b>Email:</b> {{ $invoice->receiver->email }}</p>
                                    <p class="mb-1"><b>Contact No:</b> {{ $invoice->receiver->contact }}</p>
                                    <p class="mb-1"><b>Country:</b> {{ $invoice->receiver->country }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-borderless mb-5"
                                style="margin: 0 !important; font-size: 12px; line-height: 0.3">
                                <thead class="border-top">
                                    <tr>
                                        <th>No</th>
                                        <th>Dimensions (CM)</th>
                                        <th>Unit Price (£)</th>
                                        <th>Volume Weight</th>
                                        <th>Weight (kg)</th>
                                        <th>Amount (£)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoice->items as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->width }}x{{ $item->height }}x{{ $item->length }}</td>
                                            <td>£ {{ $item->unit_price }}</td>
                                            <td>{{ $item->volume_weight }}</td>
                                            <td>{{ $item->weight }} KG</td>
                                            <td>£ {{ $item->price }}</td>

                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td>Collection & Delivary</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>£ {{ $invoice->collection_fee }}</td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>Other</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>£ {{ $invoice->handling_fee }}</td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="card-body" style="padding-top: 0px; padding-bottom: 0px">

                            <div class="row">
                                <div class="col-md-6 mb-md-0 mb-3" style="font-size: 12px">
                                    <h6>Bank Details</h6>
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
                                                        <h3 class="w-px-150 total-text">Total:</h3>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <h3 class="w-px-150 total-text">£ {{ $invoice->total_fee }}</h3>
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
                                    <span class="fw-medium text-heading">Note:</span>
                                    <span>{{ $invoice->note }}</span>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0" />

                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <h6 class="pb-0">DON'T SEND</h6>
                                    <img width="100%" src="{{ asset('backend/assets/svg/invoiceicon.png') }}"
                                        alt="" srcset="">
                                </div>
                                <div class="col-8">
                                    <h6 class="pb-0">TERMS & CONDETIONS</h6>
                                    <ul style="font-size: 12px">
                                        <li>All non document items are subject to inspection.</li>
                                        <li>Sender will be responsible penalties for any wrong declaration</li>

                                        <li>Custom duty is not included. Any custom Duty, Customeris liable to pay.</li>
                                        <li>All deliveries are subject to Airline weather conditions, Custom clearance &
                                            flight schedule, Delays.</li>
                                        <li>Economy Air cargo ( Below 5 KG) Delivery Within 5-7 working days.</li>
                                        <li>Chargeable weight (Gross weight or Volume weight) Whichever highest is.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <hr class="my-0" />
                        <div class="card-body" style="font-size: 12px;">
                            <div class="row">
                                <div class="col-12 justify-center text-center">
                                    <p class="m-0">C.on Group Ltd - 12, King Arthur Road, Waltham Cross, London, EN8 8EH
                                        &nbsp; <span class="mdi mdi-phone-classic"> 01992416763</span></p>
                                    <p>Company Reg No. 15130909 | VAT No. 114248415</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /Invoice -->

            <!-- Invoice Actions -->
            <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                <div class="card mb-4">
                    <div class="card-body">
                        <button class="btn btn-primary d-grid w-100 mb-3" data-bs-toggle="offcanvas"
                            data-bs-target="#sendInvoiceOffcanvas">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                    class="mdi mdi-send-outline scaleX-n1-rtl me-1"></i>Send Invoice</span>
                        </button>
                        <button id="download-pdf" class="btn btn-outline-secondary d-grid w-100 mb-3">Download</button>
                        <button class="btn btn-outline-secondary d-grid w-100 mb-3" id="print-pdf">
                            Print
                        </button>
                        <a href="{{ route('invoice.label.preview', ['id' => $invoice->id]) }}" type="button" class="btn btn-warning d-grid w-100 mb-3">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                    class="mdi mdi-receipt-text-check-outline scaleX-n1-rtl me-1"></i>Label</span>
                            </a>
                        {{-- <a href="./app-invoice-edit.html" class="btn btn-outline-secondary d-grid w-100 mb-3">
                            Edit Invoice
                        </a> --}}
                        {{-- <button class="btn btn-success d-grid w-100" data-bs-toggle="offcanvas"
                            data-bs-target="#addPaymentOffcanvas">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                    class="mdi mdi-currency-usd me-1"></i>Add Payment</span>
                        </button> --}}
                    </div>
                </div>


                <div id="response-message" class="alert alert-info alert-dismissible" style="display: none;"
                    role="alert">


                    <p class="mb-0" id="response-message-text">

                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                        <input type="text" class="form-control" id="invoice-from" value="sales@concargo.co.uk"
                            placeholder="sales@concargo.co.uk" disabled />
                        <label for="invoice-from">From</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="invoice-to"
                            value="{{ $invoice->sender->email }}" placeholder="company@email.com" />
                        <label for="invoice-to">To</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="email-subject" value="Invoice of C.On Cargo Ltd"
                            placeholder="Invoice regarding goods" />
                        <label for="invoice-subject">Subject</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <textarea class="form-control" name="invoice-message" id="invoice-message" style="height: 190px">
                            Please find the attached PDF invoice.</textarea>
                        <label for="invoice-message">Message</label>
                    </div>
                    <div class="mb-4">
                        <span class="badge bg-label-primary rounded-pill">
                            <i class="mdi mdi-link-variant mdi-14px me-1"></i>
                            <span class="align-middle">Invoice Attached</span>
                        </span>
                    </div>
                    <div class="mb-3 d-flex flex-wrap">
                        <button id="send-email" type="button" class="btn btn-primary me-3"
                            data-bs-dismiss="offcanvas">Send</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.3/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    {{-- <script src="{{ asset('backend/assets/js/forms-tagify.js') }}"></script>
<script src="{{ asset('backend/assets/js/forms-typeahead.js') }}"></script> --}}
@endpush

@push('scripts')
    <script>
        // ---------- Download Invoice ----------
        document.getElementById('download-pdf').addEventListener('click', function() {
            // Options for html2canvas. Increasing scale can improve quality.
            const canvasOptions = {
                scale: 3, // Adjust scale factor as needed for quality vs. performance
                useCORS: true // This is important if you have images that are hosted on other domains
            };

            // Convert the div to canvas using html2canvas with the specified options
            html2canvas(document.getElementById('content-to-print'), canvasOptions).then(canvas => {
                // Create a new jsPDF instance
                const {
                    jsPDF
                } = window.jspdf;
                const pdf = new jsPDF({
                    orientation: 'portrait',
                    unit: 'mm',
                    format: 'a4'
                });

                // Convert the canvas to an image using PNG format for lossless compression
                const imgData = canvas.toDataURL('image/jpeg', 0.85);


                // Calculate the number of pages
                const imgWidth = 210; // A4 width in mm
                const imgHeight = canvas.height * imgWidth / canvas.width;
                const pageHeight = 297; // A4 height in mm
                let heightLeft = imgHeight;

                // Add the image to the PDF, possibly across multiple pages if it's long
                let position = 0;
                while (heightLeft >= 0) {
                    pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;
                }
                const now = new Date();
                const dateStr = now.toISOString().replace(/:/g, '-').replace(/\..+/, '').replace('T', '_');
                const fileName = `Invoice_${dateStr}.pdf`;
                // Save the PDF
                pdf.save(fileName);
            });

        });



        // --------- Print PDF -------------
        document.getElementById('print-pdf').addEventListener('click', function() {
            // Options for html2canvas. Increasing scale can improve quality.
            const canvasOptions = {
                scale: 3, // Adjust scale factor as needed for quality vs. performance
                useCORS: true // This is important if you have images that are hosted on other domains
            };

            // Convert the div to canvas using html2canvas with the specified options
            html2canvas(document.getElementById('content-to-print'), canvasOptions).then(canvas => {
                // Create a new jsPDF instance
                const {
                    jsPDF
                } = window.jspdf;
                const pdf = new jsPDF({
                    orientation: 'portrait',
                    unit: 'mm',
                    format: 'a4'
                });

                // Convert the canvas to an image using PNG format for lossless compression
                const imgData = canvas.toDataURL('image/jpeg', 0.85);


                // Calculate the number of pages
                const imgWidth = 210; // A4 width in mm
                const imgHeight = canvas.height * imgWidth / canvas.width;
                const pageHeight = 297; // A4 height in mm
                let heightLeft = imgHeight;

                // Add the image to the PDF, possibly across multiple pages if it's long
                let position = 0;
                while (heightLeft >= 0) {
                    pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;
                }

                // Save the PDF
                // Open PDF in new window and print
                pdf.autoPrint({
                    variant: 'non-conform'
                });
                window.open(pdf.output('bloburl'), '_blank');
            });

        });


        // -------------- Mail Invoice ---------------
        document.getElementById('send-email').addEventListener('click', function() {
            const canvasOptions = {
                scale: 3, // Adjust scale factor as needed for quality vs. performance
                useCORS: true // This is important if you have images that are hosted on other domains
            };
            html2canvas(document.getElementById('content-to-print'), canvasOptions).then(canvas => {
                const pdf = new window.jspdf.jsPDF({
                    orientation: 'portrait',
                    unit: 'mm',
                    format: 'a4'
                });
                const imgData = canvas.toDataURL('image/jpeg', 0.85);
                const imgWidth = 210; // A4 width in mm
                const pageHeight = 297; // A4 height in mm
                const imgHeight = canvas.height * imgWidth / canvas.width;
                let heightLeft = imgHeight;
                let position = 0;

                pdf.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;

                while (heightLeft >= 0) {
                    position = heightLeft - imgHeight;

                    pdf.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;
                }

                // Convert the PDF to a base64 string
                const pdfBase64String = pdf.output('datauristring');
                const base64Data = pdfBase64String.split(';base64,')[1];

                const emailSubject = document.getElementById('email-subject').value;
                const emailReciever = document.getElementById('invoice-to').value;
                const emailMessage = document.getElementById('invoice-message').value;



                fetch('/sendpdf', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        },
                        body: JSON.stringify({
                            pdf: base64Data,
                            subject: emailSubject,
                            receiver: emailReciever,
                            message: emailMessage
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        displayMessag(data.message);
                    })
                    .catch((error) => {
                        displayMessag('Error: ' + error.message);
                    });
            });
        });

        function displayMessag(message) {
            const messageDiv = document.getElementById('response-message');
            messageDiv.style.display = 'block';
            var messageParagraph = document.getElementById('response-message-text');
            messageParagraph.textContent = message;
        }
    </script>
@endpush
