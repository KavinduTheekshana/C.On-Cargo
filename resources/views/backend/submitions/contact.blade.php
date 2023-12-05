@extends('layouts.backend')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Users List Table -->
        @include('backend.components.alert')

        <div class="card">
            <div class="card-header border-bottom">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Contact Form Submitions</h5>
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table id="customerTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <td>Actions</td>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $classes = ['bg-label-warning', 'bg-label-danger', 'bg-label-info', 'bg-label-primary', 'bg-label-secondary', 'bg-label-success'];
                        @endphp
                        @foreach ($contacts as $index => $contact)
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->subject }}</td>
                                <td>
                                    @if ($contact->status)
                                        <span class="badge rounded-pill bg-success">Read</span>
                                    @else
                                        <span class="badge rounded-pill bg-warning">Unred</span>
                                    @endif
                                </td>
                                <td> <button type="button"
                                    class="btn btn-icon btn-dark btn-fab demo waves-effect waves-light m-1 preview-btn"
                                    data-bs-toggle="modal" title="View Invoice"
                                    data-contactid="{{ $contact->id }}" data-bs-target="#addNewAddress">
                                    <i class="tf-icons mdi mdi-eye-outline"></i>
                                </button>

                                @if ($contact->status)
                                    <a href="{{ route('contact.diactive', ['id' => $contact->id]) }}"
                                        type="button"
                                        class="btn btn-icon btn-warning btn-fab demo waves-effect waves-light m-1">
                                        <i class="tf-icons mdi mdi-lock-outline"></i>
                                    </a>
                                @else
                                    <a href="{{ route('contact.active', ['id' => $contact->id]) }}"
                                        type="button"
                                        class="btn btn-icon btn-success btn-fab demo waves-effect waves-light m-1">
                                        <i class="tf-icons mdi mdi-lock-open-variant-outline"></i>
                                    </a>
                                @endif
                                <a href="{{ route('contact.delete', ['id' => $contact->id]) }}"
                                    type="button"
                                    class="btn btn-icon btn-danger btn-fab demo waves-effect waves-light m-1">
                                    <i class="tf-icons mdi mdi-trash-can-outline"></i>
                                </a>
                            </td>

                            </tr>
                        @endforeach
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
                    <div id="invoiceDetails">
                        <p><b>Name: </b><span id="modal_name"></span></p>
                        <p><b>Email: </b><span id="modal_email"></span></p>
                        <p><b>Phone: </b><span id="modal_phone"></span></p>
                        <p><b>Subject: </b><span id="modal_subject"></span></p>
                        <p><b>Message: </b><span id="modal_message"></span></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- Modal  --}}
@endsection
@push('vendorsjs')
    <script src="{{ asset('backend/assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
@endpush


@push('pagejs')
    <script src="{{ asset('backend/assets/js/app-user-list.js') }}"></script>
@endpush

@push('scripts')
  <script>
      $('.preview-btn').on('click', function() {
            var contactid = $(this).data('contactid'); // Make sure to set this data attribute on each button
            $.ajax({
                url: '/contact/' + contactid + '/details',
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    // Assuming response is the invoice object with an items array
                    $('#modal_name').text(response.name);
                    $('#modal_email').text(response.email);
                    $('#modal_phone').text(response.phone);
                    $('#modal_subject').text(response.subject);
                    $('#modal_message').text(response.message);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
  </script>
    @endpush
