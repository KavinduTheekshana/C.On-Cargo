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
                <div class="card invoice-preview-card" style="width: 210mm;">

                    <div id="content-to-print">
                        @foreach ($invoice->items as $item)
                            @for ($i = 0; $i < 2; $i++)
                                <div class="label">
                                    <div class="card-body p-manual">
                                        <div
                                            class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column">
                                            <div class="mb-xl-0 pb-1">

                                                <div style="width: 170px" class="mb-2 mt-1">
                                                    <span class="app-brand-logo demo">
                                                        <img width="170px" src="{{ asset('backend/assets/svg/logoname.png') }}"
                                                            alt="" srcset="">
                                                    </span>
                                                </div>
                                            </div>
                                            <div>
                                                <div>
                                                    {!! DNS1D::getBarcodeHtml("$invoice->invoice_id", 'C128', 1.5, 50) !!}
                                                    <p class="barcode-text"> C.ON {{ $invoice->invoice_id }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-0 black" />
                                    <div class="card-body p-manual pt-2">
                                        <div class="row">
                                            <div class="col-md-6 vertical-line line">
                                                <h3 class="pb-0"><b class="black">Sender Details:</b></h3>
                                                <hr class="black">
                                                <h4 class="mb-2"><b>Name:</b> {{ $invoice->sender->firstname }}
                                                    {{ $invoice->sender->lastname }}</h4>
                                                    <hr class="black">
                                                <h4 class="mb-2"><b>Address:</b>  <br>{{ $invoice->sender->address }} -
                                                    {{ $invoice->sender->country }}</h4>
                                                    <hr class="black">
                                                <h4 class="mb-2"><b>Post Code:</b> {{ $invoice->sender->postcode }}</h4>
                                                <hr class="black">
                                                <h4 class="mb-0"><b>Contact No:</b> {{ $invoice->sender->contact }}</h4>

                                            </div>
                                            <div class="col-md-6">
                                                <h3 class="pb-0"><b class="black">Consignee Details:</b></h3>
                                                <hr class="black">
                                                <h4 class="mb-2"><b>Name:</b> {{ $invoice->receiver->firstname }}
                                                    {{ $invoice->sender->lastname }}</p>
                                                    <hr class="black">
                                                    <h4 class="mb-2"><b>Address:</b> <br> {{ $invoice->receiver->address }} - {{ $invoice->receiver->country }}
                                                    </h4>
                                                    <hr class="black">
                                                    <h4 class="mb-2"><b>Post Code:</b> {{ $invoice->receiver->postcode }}
                                                    </h4>
                                                    <hr class="black">
                                                    <h4 class="mb-0"><b>Contact No:</b> {{ $invoice->receiver->contact }}
                                                    </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="black">
                                    <div class="card-body p-manual pt-0">
                                        <h3 class="pb-1"><b>{{ $item->width }}x{{ $item->height }}x{{ $item->length }}
                                                cm
                                                | {{ $item->weight }} kg</b></h3>
                                    </div>
                                </div>
                            @endfor
                        @endforeach

                    </div>

                </div>
            </div>


            <!-- /Invoice -->

            <!-- Invoice Actions -->
            <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                <div class="card mb-4">
                    <div class="card-body">

                        <button id="download-pdf" class="btn btn-outline-secondary d-grid w-100 mb-3">Download</button>
                        <button class="btn btn-outline-secondary d-grid w-100 mb-3" id="print-pdf">
                            Print
                        </button>

                        <a href="{{ route('invoice.preview', ['id' => $invoice->id]) }}" type="button"
                            class="btn btn-primary d-grid w-100 mb-3">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                    class="mdi mdi-file-document-outline scaleX-n1-rtl me-1"></i>Invoice</span>
                        </a>

                    </div>
                </div>


                <div id="response-message" class="alert alert-info alert-dismissible" style="display: none;" role="alert">


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
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body flex-grow-1">
                <form>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="invoice-from" value="sales@concargo.co.uk"
                            placeholder="sales@concargo.co.uk" disabled />
                        <label for="invoice-from">From</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="invoice-to" value="{{ $invoice->sender->email }}"
                            placeholder="company@email.com" />
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

                    if (heightLeft > 10) {
                        position = -heightLeft; // Move content up by the remaining height
                        pdf.addPage(); // Add a new page
                    }
                }
                const now = new Date();
                const dateStr = now.toISOString().replace(/:/g, '-').replace(/\..+/, '').replace('T', '_');
                const fileName = `Label${dateStr}.pdf`;
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
                    if (heightLeft > 0) {
                        position = -heightLeft; // Move content up by the remaining height
                        pdf.addPage(); // Add a new page
                    }
                }
                // Save the PDF
                // Open PDF in new window and print
                pdf.autoPrint({
                    variant: 'non-conform'
                });
                window.open(pdf.output('bloburl'), '_blank');
            });
        });
    </script>
@endpush
