@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/flatpickr/flatpickr.css') }}" />
@endpush

@extends('layouts.backend')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row invoice-preview">
          <!-- Invoice -->
          <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
            <div class="card invoice-preview-card">
              <div class="card-body">
                <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column">
                  <div class="mb-xl-0 pb-3">
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
                  <div>
                    <h4 class="fw-medium">INVOICE #{{$invoice->invoice_id}}</h4>
                    <div class="mb-1">
                      <span>Date Issues:</span>
                      <span>{{$invoice->date}}</span>
                    </div>
                    <div>
                      <span>Job Number:</span>
                      <span>{{$invoice->job_number}}</span>
                    </div>
                    <div>
                        <span>Customer ID:</span>
                        <span>{{$invoice->customer_id}}</span>
                      </div>
                      <br>
                      <div>
                       {!! DNS1D::getBarcodeHtml("$invoice->invoice_id",'C128',1.5,80) !!}
                       C.On Cargo {{$invoice->invoice_id}}
                      </div>
                  </div>
                </div>
              </div>
              <hr class="my-0" />
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6 vertical-line line">
                      <h6 class="pb-1">Sender Details:</h6>
                      <p class="mb-1"><b>Name:</b> {{$invoice->sender->firstname}} {{$invoice->sender->lastname}}</p>
                      <p class="mb-1"><b>Address:</b> {{$invoice->sender->address}}</p>
                      <p class="mb-1"><b>Post Code:</b> {{$invoice->sender->postcode}}</p>
                      <p class="mb-1"><b>Email:</b> {{$invoice->sender->email}}</p>
                      <p class="mb-1"><b>Contact No:</b> {{$invoice->sender->contact}}</p>
                      <p class="mb-1"><b>Country:</b> {{$invoice->sender->country}}</p>
                  </div>
                  <div class="col-md-6">
                    <h6 class="pb-1">Receiver Details:</h6>
                    <p class="mb-1"><b>Name:</b> {{$invoice->receiver->firstname}} {{$invoice->sender->lastname}}</p>
                    <p class="mb-1"><b>Address:</b> {{$invoice->receiver->address}}</p>
                    <p class="mb-1"><b>Post Code:</b> {{$invoice->receiver->postcode}}</p>
                    <p class="mb-1"><b>Email:</b> {{$invoice->receiver->email}}</p>
                    <p class="mb-1"><b>Contact No:</b> {{$invoice->receiver->contact}}</p>
                    <p class="mb-1"><b>Country:</b> {{$invoice->receiver->country}}</p>
                  </div>
              </div>
              </div>
              <div class="table-responsive">
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
                    @foreach($invoice->items as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{$item->width}}x{{$item->height}}x{{$item->length}}</td>
                      <td>£ {{$item->unit_price}}</td>
                      <td>{{$item->volume_weight}}</td> 
                      <td>{{$item->weight}} KG</td>
                      <td>£ {{$item->price}}</td>
                     
                    </tr>
                    @endforeach
                    <tr>
                      <td></td>
                      <td>Collection & Delivary</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>£ {{$invoice->collection_fee}}</td>
                    </tr>
                
                    <tr>
                      <td></td>
                      <td>Handling Fee</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>£ {{$invoice->handling_fee}}</td>
                    </tr>
                
                 
                  </tbody>
                </table>
              </div>
              <hr>
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
                      <ul>
                          <li>Insuarance Policy Maximum Cover £50</li>
                      </ul>
                  </div>
                  <div class="col-md-6 d-flex justify-content-md-end mt-2">
                      <div class="invoice-calculations">


                          <div class="d-flex justify-content-between mb-2">
                              <div class="row">
                                  <div class="col d-flex justify-content-end align-items-end">  <div class="content">
                                      <h3 class="w-px-150 total-text">Total:</h3>
                                  </div></div>
                                  
                                  <div class="col">
                                    <h3 class="w-px-150 total-text">£ {{$invoice->total_fee}}</h3>
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
                    <span
                      >{{$invoice->note}}</span
                    >
                  </div>
                </div>
              </div>
              <hr class="my-0" />

              <div class="card-body">
                <div class="row">
                  <div class="col-4">
                    <h6 class="pb-0">DON'T SEND</h6>
                    <img src="{{ asset('backend/assets/svg/invoiceicon.svg') }}" alt="" srcset="">
                  </div>
                  <div class="col-8">
                    <h6 class="pb-0">Terms & Condetions</h6>
                    <ul>
                      <li>All non document items are subject to inspection.</li>
                      <li>Sender will be responsible penalties for any wrong declaration</li>
          
                      <li>Custom duty is not included. Any custom Duty, Customeris liable to pay.</li>
                      <li>All deliveries are subject to Airline weather conditions, Custom clearance & flight schedule, Delays.</li>
                      <li>Economy Air cargo ( Below 5 KG) Delivery Within 5-7 working days.</li>
                      <li>Chargeable weight (Gross weight or Volume weight) Whichever highest is.</li>
                    </ul>
                  </div>
                </div>
              </div>

              <hr class="my-0" />
              <div class="card-body">
                <div class="row">
                  <div class="col-12 justify-center text-center">
                  <p>C.on Group Ltd - 12, King Arthur Road, Waltham Cross, London, EN8 8EH &nbsp; <span class="mdi mdi-phone-classic"> 01992416763</span></p>
                  <p>Company Reg No. 15130909 | VAT No. 114248415</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /Invoice -->

          <!-- Invoice Actions -->
          <div class="col-xl-3 col-md-4 col-12 invoice-actions">
            <div class="card">
              <div class="card-body">
                <button
                  class="btn btn-primary d-grid w-100 mb-3"
                  data-bs-toggle="offcanvas"
                  data-bs-target="#sendInvoiceOffcanvas">
                  <span class="d-flex align-items-center justify-content-center text-nowrap"
                    ><i class="mdi mdi-send-outline scaleX-n1-rtl me-1"></i>Send Invoice</span
                  >
                </button>
                <button class="btn btn-outline-secondary d-grid w-100 mb-3">Download</button>
                <a
                  class="btn btn-outline-secondary d-grid w-100 mb-3"
                  target="_blank"
                  href="./app-invoice-print.html">
                  Print
                </a>
                <a href="./app-invoice-edit.html" class="btn btn-outline-secondary d-grid w-100 mb-3">
                  Edit Invoice
                </a>
                <button
                  class="btn btn-success d-grid w-100"
                  data-bs-toggle="offcanvas"
                  data-bs-target="#addPaymentOffcanvas">
                  <span class="d-flex align-items-center justify-content-center text-nowrap"
                    ><i class="mdi mdi-currency-usd me-1"></i>Add Payment</span
                  >
                </button>
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
            <button
              type="button"
              class="btn-close text-reset"
              data-bs-dismiss="offcanvas"
              aria-label="Close"></button>
          </div>
          <div class="offcanvas-body flex-grow-1">
            <form>
              <div class="form-floating form-floating-outline mb-4">
                <input
                  type="text"
                  class="form-control"
                  id="invoice-from"
                  value="shelbyComapny@email.com"
                  placeholder="company@email.com" />
                <label for="invoice-from">From</label>
              </div>
              <div class="form-floating form-floating-outline mb-4">
                <input
                  type="text"
                  class="form-control"
                  id="invoice-to"
                  value="qConsolidated@email.com"
                  placeholder="company@email.com" />
                <label for="invoice-to">To</label>
              </div>
              <div class="form-floating form-floating-outline mb-4">
                <input
                  type="text"
                  class="form-control"
                  id="invoice-subject"
                  value="Invoice of purchased Admin Templates"
                  placeholder="Invoice regarding goods" />
                <label for="invoice-subject">Subject</label>
              </div>
              <div class="form-floating form-floating-outline mb-4">
                <textarea class="form-control" name="invoice-message" id="invoice-message" style="height: 190px">
Dear Queen Consolidated,
    Thank you for your business, always a pleasure to work with you!
    We have generated a new invoice in the amount of $95.59
    We would appreciate payment of this invoice by 05/11/2021</textarea
                >
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

        <!-- Add Payment Sidebar -->
        <div class="offcanvas offcanvas-end" id="addPaymentOffcanvas" aria-hidden="true">
          <div class="offcanvas-header mb-3">
            <h5 class="offcanvas-title">Add Payment</h5>
            <button
              type="button"
              class="btn-close text-reset"
              data-bs-dismiss="offcanvas"
              aria-label="Close"></button>
          </div>
          <div class="offcanvas-body flex-grow-1">
            <div class="d-flex justify-content-between bg-lighter p-2 mb-3">
              <p class="mb-0">Invoice Balance:</p>
              <p class="fw-medium mb-0">$5000.00</p>
            </div>
            <form>
              <div class="input-group input-group-merge mb-4">
                <span class="input-group-text">$</span>
                <div class="form-floating form-floating-outline">
                  <input
                    type="text"
                    id="invoiceAmount"
                    name="invoiceAmount"
                    class="form-control invoice-amount"
                    placeholder="100" />
                  <label for="invoiceAmount">Payment Amount</label>
                </div>
              </div>
              <div class="form-floating form-floating-outline mb-4">
                <input id="payment-date" class="form-control invoice-date" type="text" />
                <label for="payment-date">Payment Date</label>
              </div>
              <div class="form-floating form-floating-outline mb-4">
                <select class="form-select" id="payment-method">
                  <option value="" selected disabled>Select payment method</option>
                  <option value="Cash">Cash</option>
                  <option value="Bank Transfer">Bank Transfer</option>
                  <option value="Debit Card">Debit Card</option>
                  <option value="Credit Card">Credit Card</option>
                  <option value="Paypal">Paypal</option>
                </select>
                <label for="payment-method">Payment Method</label>
              </div>
              <div class="form-floating form-floating-outline mb-4">
                <textarea class="form-control" id="payment-note" style="height: 62px"></textarea>
                <label for="payment-note">Internal Payment Note</label>
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
        <!-- /Add Payment Sidebar -->

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

@endpush
