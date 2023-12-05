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
                        <h5 class="card-title">Newsletter Subscribers</h5>
                    </div>
                    <div class="col d-flex" style="justify-content: end"> <a href="{{ route('download.email.list') }}" type="button" class="btn btn-success"><span
                                class="mdi mdi-download-box-outline"></span> &nbsp;Download Email List</a></div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table id="customerTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email Adress</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $classes = ['bg-label-warning', 'bg-label-danger', 'bg-label-info', 'bg-label-primary', 'bg-label-secondary', 'bg-label-success'];
                        @endphp
                        @foreach ($newsletters as $index => $newsletter)
                            <tr>
                                {{-- <td>{{ $newsletter->id }}</td> --}}
                                <td>{{ $index + 1 }}</td>


                                <td>{{ $newsletter->email }}</td>


                            </tr>
                        @endforeach
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
