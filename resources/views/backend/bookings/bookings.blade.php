@extends('layouts.backend')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Bookings /</span> List</h4>

        <!-- Invoice List Widget -->



        <!-- Invoice List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Bookings List</h5>
                    </div>

                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table id="bookings" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>User ID</th>
                            <th>User's Details</th>
                            <th>Box Size</th>
                            <th>Weight</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach ($bookings as $item)
                        <tr>
                            <td>B{{ $item->id }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>U{{ $item->user_id }}</td>
                            <td><b>{{ $item->user->name }}</b> <br>{{ $item->user->email }}<br>{{ $item->contact }} </td>
                            <td>{{ $item->width }}x{{ $item->height }}x{{ $item->length }}</td>
                            <td>{{ $item->weight }} KG</td>
                            <td>
                                @if ($item->status)
                                    <span class="badge rounded-pill bg-success">Approved</span>
                                @else
                                    <span class="badge rounded-pill bg-warning">Pending</span>
                                @endif
                            </td>
                            <td>
                                <div class="row">
                                    <a href="{{ route('booking.create', ['id' => $item->id]) }}"
                                        type="button"
                                        class="btn btn-icon btn-dark btn-fab demo waves-effect waves-light m-1">
                                        <i class="tf-icons mdi mdi-eye-outline"></i>
                                    </a>
                                    {{-- <button type="button"
                                        class="btn btn-icon btn-dark btn-fab demo waves-effect waves-light m-1 view-invoices"
                                        data-bs-toggle="modal" title="View Invoice"
                                        data-customerid="{{ $item->id }}" data-bs-target="#addNewAddress">
                                        <i class="tf-icons mdi mdi-eye-outline"></i>
                                    </button> --}}

                                    @if ($item->status)
                                        <a href="{{ route('booking.diactive', ['id' => $item->id]) }}"
                                            type="button"
                                            class="btn btn-icon btn-warning btn-fab demo waves-effect waves-light m-1">
                                            <i class="tf-icons mdi mdi-octagon-outline"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('booking.active', ['id' => $item->id]) }}"
                                            type="button"
                                            class="btn btn-icon btn-success btn-fab demo waves-effect waves-light m-1">
                                            <i class="tf-icons mdi mdi-check"></i>
                                        </a>
                                    @endif

                                    <button type="button" onclick="openSweetAlert({{ $item->id }})"
                                        class="btn btn-icon btn-danger btn-fab demo waves-effect waves-light m-1">
                                        <i class="tf-icons mdi mdi-trash-can-outline"></i>
                                    </button>

                                </div>

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
            $('#bookings').DataTable({
                "order": [
                    [0, "desc"]
                ]
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

                    fetch(`/booking/delete/admin/${$id}`, {
                            method: 'GET',
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.message === 'Booking deleted successfully') {
                                Swal.fire('Deleted!', 'The Booking has been deleted.', 'success');
                                // Reload the current page after a short delay
                                setTimeout(() => {
                                    location.reload();
                                }, 1000); // 1000 milliseconds = 1 second
                            }  else {
                                Swal.fire('Error', 'Something went wrong!', 'error');
                            }
                        });


                }
            })
        }
    </script>
@endpush
