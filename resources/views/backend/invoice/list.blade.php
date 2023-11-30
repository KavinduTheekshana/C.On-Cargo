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
                    <div class="col d-flex" style="justify-content: end"> <a href="{{ route('invoice.create') }}"
                            type="button" class="btn btn-primary"><span class="mdi mdi-plus"></span> &nbsp;Create
                            Invoice</a></div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table id="invoice" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>I/Number</th>
                            <th>Date</th>
                            <th>Job Number</th>

                            <th>Customer Details</th>
                            {{-- <th>Receiver Details</th> --}}
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach ($invoices as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->invoice_id }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->job_number }}</td>

                            <td><span class="text-dark">C{{ $item->customer_id }}. </span>
                                <b>{{ $item->customer->firstname }}&nbsp;{{ $item->customer->lastname }}
                                </b><br>{{ $item->customer->address }}<br>{{ $item->customer->email }}</td>
                            {{-- <td><b>{{$item->receiver->firstname}}&nbsp;{{$item->receiver->lastname}} </b><br>{{$item->receiver->address}}</td> --}}
                            <td>£{{ $item->total_fee }}</td>
                            <td>

                                <button type="button"
                                    class="btn btn-icon btn-dark btn-fab demo waves-effect waves-light m-1 preview-btn"
                                    data-bs-toggle="modal" title="Preview Invoice" data-invoice-id="{{ $item->id }}"
                                    data-bs-target="#addNewAddress" data-toggle="tooltip">
                                    <i class="tf-icons mdi mdi-eye-outline"></i>
                                </button>

                                <button type="button" href="{{ route('invoice.preview', ['id' => $item->id]) }}"
                                    title="Invoice" data-toggle="tooltip"
                                    class="btn btn-icon btn-primary btn-fab demo waves-effect waves-light m-1">
                                    <i class="tf-icons mdi mdi-file-document-outline"></i>
                                </button>

                                <a type="button" href="{{ route('invoice.label.preview', ['id' => $item->id]) }}"
                                    title="Label" data-toggle="tooltip"
                                    class="btn btn-icon btn-warning btn-fab demo waves-effect waves-light m-1">
                                    <i class="tf-icons mdi mdi-receipt-text-check-outline"></i>
                                </a>

                                {{-- <a type="button" href="{{ route('invoice.label.preview', ['id' => $item->id]) }}"
                                    title="Edit Invoice" data-toggle="tooltip" class="btn btn-icon btn-info btn-fab demo waves-effect waves-light m-1">
                                    <i class="tf-icons mdi mdi-file-edit-outline"></i>
                                </a> --}}

                                @if (auth()->user() && auth()->user()->role == 0)
                                    <button type="button" onclick="openSweetAlert({{ $item->id }})" title="Delete" data-toggle="tooltip"
                                        class="btn btn-icon btn-danger btn-fab demo waves-effect waves-light m-1">
                                        <i class="tf-icons mdi mdi-trash-can-outline"></i>
                                    </button>
                                @endif
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
                    {{-- Invoice  --}}
                    <div id="content-to-print">
                        <div class="card-body pb-1">
                            <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column">
                                <div class="mb-xl-0 pb-1 w-100">
                                    <div class="row">
                                        <div style="width: 200px" class="mb-2 col">
                                            <span class="app-brand-logo demo">
                                                <img width="160px" src="{{ asset('backend/assets/svg/logo.png') }}"
                                                    alt="" srcset="">
                                            </span>

                                        </div>
                                        <div class="col">
                                            <h1><b>INVOICE</b></h1>
                                        </div>

                                        <div class="col" style="font-size: 12px">
                                            <h6 class="fw-medium">INVOICE #<span id="modalInvoiceId"></span></h6>
                                            <div class="mb-1">
                                                <span>Date Issue:</span>
                                                <span id="modalInvoiceDate"></span>
                                            </div>
                                            <div>
                                                <span>Job Number:</span>
                                                <span id="modalJobNumber"></span>
                                            </div>
                                            <div>
                                                <span>Customer ID:</span>
                                                <span id="modalCustomerId"></span>
                                            </div>


                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row" style="font-size: 12px">
                                        <div class="col-md-12">
                                            <p class="mb-1"><b>C.ON Group Ltd</b></p>
                                            <p class="mb-1">12 King Arthur Road, Waltham Cross, London, EN8 8EH</p>
                                            <p class="mb-1">info@concargo.co.uk</p>
                                            <p class="mb-0">+44 7503 288 488</p>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <p class="mb-1"><b>C.ON Cargo Ltd</b></p>
                                            <p class="mb-1">184/B, Moratuwa Road, Piliyandala, <br>Sri Lanka</p>
                                            <p class="mb-1">sl@concargo.co.uk</p>
                                            <p class="mb-0">+94 766 99 66 52</p>
                                        </div> --}}
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body mt-2 mb-2" style="font-size: 12px">
                            <div class="row">
                                <div class="col-md-6 vertical-line line">
                                    <h6 class="pb-1">Sender Details:</h6>
                                    <p class="mb-1"><b>Name:</b> <span id="modalSenderFirstName"></span>&nbsp;<span
                                            id="modalSenderLastName"></span></p>
                                    <p class="mb-1"><b>Address:</b> <span id="modalSenderAddress"></span></p>
                                    <p class="mb-1"><b>Post Code:</b> <span id="modalSenderPostCode"></span></p>
                                    <p class="mb-1"><b>Email:</b> <span id="modalSenderEmail"></span></p>
                                    <p class="mb-1"><b>Contact No:</b> <span id="modalSenderContact"></span></p>
                                    <p class="mb-1"><b>Country:</b> <span id="modalSenderCountry"></span></p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="pb-1">Consignee Details:</h6>
                                    <p class="mb-1"><b>Name:</b> <span id="modalReceiverFirstName"></span>&nbsp;<span
                                            id="modalReceiverLastName"></span></p>
                                    <p class="mb-1"><b>Address:</b> <span id="modalReceiverAddress"></span></p>
                                    <p class="mb-1"><b>Post Code:</b> <span id="modaReceiverPostCode"></span></p>
                                    <p class="mb-1"><b>Email:</b> <span id="modalReceiverEmail"></span></p>
                                    <p class="mb-1"><b>Contact No:</b> <span id="modalReceiverContact"></span></p>
                                    <p class="mb-1"><b>Country:</b> <span id="modalReceiverCountry"></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="modalItemsTable" class="table table-borderless mb-5"
                                style="margin: 0 !important; font-size: 12px;">
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




                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td>Collection & Delivary</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><span id="modalCollectionFee"></span></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>Other</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><span id="modalHandlingFee"></span></td>
                                    </tr>
                                </tfoot>
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
                                                        <h3 class="w-px-150 total-text">Total:</h3>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <h3 id="modalTotal" class="w-px-150 total-text"></h3>
                                                </div>
                                            </div>



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
                                    <span id="modalNote"></span>
                                </div>
                            </div>
                        </div>




                    </div>
                    {{-- Invoice  --}}
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
                "order": [
                    [0, "desc"]
                ]
            });
        });

        // tooltip
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

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

        //invoice details modal
        $('.preview-btn').on('click', function() {
            var invoiceId = $(this).data('invoice-id'); // Make sure to set this data attribute on each button

            $.ajax({
                url: '/invoices/' + invoiceId + '/details',
                type: 'GET',
                success: function(response) {
                    // Assuming response is the invoice object with an items array
                    $('#modalInvoiceId').text(response.invoice_id);
                    $('#modalInvoiceDate').text(response.date);
                    $('#modalJobNumber').text(response.job_number);
                    $('#modalCustomerId').text(response.customer_id);
                    $('#modalCollectionFee').text(response.collection_fee);
                    $('#modalHandlingFee').text(response.handling_fee);
                    $('#modalTotal').text(response.total_fee);
                    $('#modalNote').text(response.note);
                    // sender details
                    $('#modalSenderFirstName').text(response.sender.firstname);
                    $('#modalSenderLastName').text(response.sender.lastname);
                    $('#modalSenderEmail').text(response.sender.email);
                    $('#modalSenderContact').text(response.sender.contact);
                    $('#modalSenderAddress').text(response.sender.address);
                    $('#modalSenderPostCode').text(response.sender.postcode);
                    $('#modalSenderCountry').text(response.sender.country);
                    // receiver details
                    $('#modalReceiverFirstName').text(response.receiver.firstname);
                    $('#modalReceiverLastName').text(response.receiver.lastname);
                    $('#modalReceiverEmail').text(response.receiver.email);
                    $('#modalReceiverContact').text(response.receiver.contact);
                    $('#modalReceiverAddress').text(response.receiver.address);
                    $('#modaReceiverPostCode').text(response.receiver.postcode);
                    $('#modalReceiverCountry').text(response.receiver.country);
                    // Populate more invoice fields

                    // Clear previous items
                    $('#modalItemsTable tbody').empty();

                    // Populate items table
                    response.items.forEach(function(item, index) {
                        var iteration = index + 1;
                        var row = '<tr>' +
                            '<td>' + iteration + '</td>' +
                            '<td>' + item.width + 'x' + item.height + 'x' + item.length +
                            '</td>' +
                            '<td>' + item.unit_price + '</td>' +
                            '<td>' + item.volume_weight + '</td>' +
                            '<td>' + item.weight + '</td>' +
                            '<td>' + item.price + '</td>'
                        '</tr>';
                        $('#modalItemsTable tbody').append(row);
                    });

                    // Show the modal
                    $('#invoicePreviewModal').modal('show');
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    </script>
@endpush
