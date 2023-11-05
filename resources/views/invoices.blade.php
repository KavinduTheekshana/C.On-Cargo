<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            src: url(data:font/woff2;charset=utf-8;base64,d09GMgABAAAAAA...) format('woff2'),
                url(data:font/woff;charset=utf-8;base64,d09GRgABAAAAAA...) format('woff');
        }

        body {
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            line-height: 1.5;
            color: #5e5f6c !important;
            background-color: #fff;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Inter', sans-serif;
        }

        .d-flex {
            display: flex !important;
        }

        .justify-content-between {
            justify-content: space-between !important;
        }

        .justify-content-end {
            justify-content: flex-end !important;
        }

        .align-items-end {
            align-items: flex-end !important;
        }

        .flex-xl-row {
            flex-direction: row;
        }

        .mb-xl-0 {
            margin-bottom: 0rem;
        }

        .pb-3 {
            padding-bottom: 1rem;
        }

        .align-items-center {
            align-items: center;
        }

        .gap-2 {
            gap: 0.5rem;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .col-md-6 {
            padding-left: 15px;
            padding-right: 15px flex: 0 0 50%;
            max-width: 50%;
        }

        .vertical-line::after {
            content: "";
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            border-right: 1px solid #d1d1d1;
            /* Adjust line color and width */
        }

        .line {
            position: relative;
            /* Required for positioning the line */
        }

        .pr-100 {
            padding-right: 100px !important;
        }

        .d-bg {
            background-color: #f4f4f6 !important;
        }

        .total-font {
            font-size: 34px !important;
        }

        .total-text {
            display: flex;
            justify-content: end;
        }

        p {
            display: block;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            margin-top: 0px;

        }

        .mb-1 {
            margin-bottom: 0.25rem !important;
        }

        hr {
            color: rgba(76, 78, 100, 0.075);
            margin-right: 0;
            margin-left: 0;
            margin-top: 0 !important;
            margin-bottom: 0 !important;
            margin: 1rem 0;
            border: 0;
            border-top: 1px solid;
            opacity: 1;
        }

        svg {
            width: 16px
        }

        .card-body {
            padding: 1.5rem;
            flex: 1 1 auto;
        }

        h6 {
            font-size: 0.9375rem;
            margin-top: 0;
            margin-bottom: 1rem;
            font-weight: 500;
            line-height: 1.1;
            color: #636578;
        }

        .table-responsive {
            overflow-x: hidden;
        }

        .mb-5 {
            margin-bottom: 3rem !important;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            vertical-align: middle;
            caption-side: bottom;
            border-collapse: collapse;
            display: table;
            text-align: left
        }

        h5 {
            font-size: 1.125rem;
            margin-top: 0;
            margin-bottom: 1rem;
            font-weight: 500;
            line-height: 1.1;
            color: #636578;
        }

        .total-text {
            display: flex;
            justify-content: end !important;
        }


        tbody {
            text-align: center widows: 100%;
            vertical-align: inherit;
        }

        th {
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            color: #636578;
        }

        td {
            padding: 0.65rem;
            color: #828393;
        }

        .justify-center {
            justify-content: center !important;
        }

        .text-center {
            text-align: center !important;
        }
    </style>
  @vite('resources/js/app.js')

</head>

<body>



    <div>
        <div>
            <div class="card-body">
                <div class="d-flex justify-content-between flex-xl-row row">
                    <div class="mb-xl-0 pb-3">
                        <div class="d-flex svg-illustration align-items-center gap-2 mb-4">
                            <span class="app-brand-logo demo">
                                <img width="140px" src="https://concargo.co.uk/frontend/assets/img/logo/logo.svg" alt="" />
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
                    {{-- <div style="width: 20%">
                        <h4 class="fw-medium">INVOICE #{{ $invoice->invoice_id }}</h4>
                        <div class="mb-1">
                            <span>Date Issues:</span>
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
                        <br>
                        <div>
                            {!! DNS1D::getBarcodeHtml("$invoice->invoice_id", 'C128', 1.5, 80) !!}
                            C.On Cargo {{ $invoice->invoice_id }}
                        </div>
                    </div> --}}
                </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 vertical-line line" style="width: 48%">
                        <h6 class="pb-1">Sender Details:</h6>
                        <p class="mb-1"><b>Name:</b> {{ $invoice->sender->firstname }}
                            {{ $invoice->sender->lastname }}</p>
                        <p class="mb-1"><b>Address:</b> {{ $invoice->sender->address }}</p>
                        <p class="mb-1"><b>Post Code:</b> {{ $invoice->sender->postcode }}</p>
                        <p class="mb-1"><b>Email:</b> {{ $invoice->sender->email }}</p>
                        <p class="mb-1"><b>Contact No:</b> {{ $invoice->sender->contact }}</p>
                        <p class="mb-1"><b>Country:</b> {{ $invoice->sender->country }}</p>
                    </div>
                    <div class="col-md-6" style="width: 48%">
                        <h6 class="pb-1">Receiver Details:</h6>
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
            <hr class="my-0" />
            <div class="table-responsive card-body">
                <table class="table table-borderless mb-5">
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
                            <td>Handling Fee</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>£ {{ $invoice->handling_fee }}</td>
                        </tr>


                    </tbody>
                </table>
            </div>
            <hr>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6" style="width: 50%">
                        <h5>Bank Details</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="mb-0"><b>Bank:</b> HSBC</p>
                                <p><b>A/C Name:</b> C.On Cargo Ltd</p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-0"><b>Sort Code:</b> 40-20-23</p>
                                <p><b>A/C Name:</b> 22349345</p>
                            </div>
                        </div>
                        <ul>
                            <li>Insuarance Policy Maximum Cover £50</li>
                        </ul>
                    </div>
                    <div class="col-md-6 d-flex justify-content-md-end mt-2" style="width: 40%; justify-content: end">
                        <div class="invoice-calculations">


                            <div class="d-flex justify-content-between mb-2">
                                <div class="row">
                                    <div class="col d-flex justify-content-end align-items-end">
                                        <div class="content">
                                            <h3 class="w-px-150 total-text" style="font-size: 34px">Total:</h3>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <h3 class="w-px-150 total-text" style="font-size: 34px">&nbsp;£ {{ $invoice->total_fee }}</h3>
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
                        <span class="fw-medium text-heading" style="font-weight: 500 !important;">Note:</span>
                        <span>{{ $invoice->note }}</span>
                    </div>
                </div>
            </div>
            <hr class="my-0" />

            <div class="card-body">
                <div class="row">
                    <div class="col-4" style="width: 40%">
                        <h6 class="pb-0">DON'T SEND</h6>
                        <img src="https://concargo.co.uk/backend/invoiceicon.svg" alt="" srcset="">
                       
                    </div>
                    <div class="col-8" style="width: 60%">
                        <h6 class="pb-0">TERMS & CONDETIONS</h6>
                        <ul>
                            <li>All non document items are subject to inspection.</li>
                            <li>Sender will be responsible penalties for any wrong declaration</li>

                            <li>Custom duty is not included. Any custom Duty, Customeris liable to pay.</li>
                            <li>All deliveries are subject to Airline weather conditions, Custom clearance & flight
                                schedule, Delays.</li>
                            <li>Economy Air cargo ( Below 5 KG) Delivery Within 5-7 working days.</li>
                            <li>Chargeable weight (Gross weight or Volume weight) Whichever highest is.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <hr class="my-0" />
            <div class="card-body">
                <div class="row">
                    <div class="col-12 justify-center text-center" style="width: 100%">
                        <p>C.on Group Ltd - 12, King Arthur Road, Waltham Cross, London, EN8 8EH &nbsp; <img width="14px" src="https://concargo.co.uk/backend/phone-classic.svg" alt="" srcset=""> 01992416763</span></p>
                        <p>Company Reg No. 15130909 | VAT No. 114248415</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
