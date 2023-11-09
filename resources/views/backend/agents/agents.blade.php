@extends('layouts.backend')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="me-1">
                                <p class="text-heading mb-2">Total Customers</p>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-2 me-1 display-6">21,459</h4>
                                </div>
                            </div>
                            <div class="avatar">
                                <div class="avatar-initial bg-label-danger rounded">
                                    <div class="mdi mdi-account-plus-outline mdi-24px scaleX-n1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="me-1">
                                <p class="text-heading mb-2">Active Customers</p>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-2 me-1 display-6">4,567</h4>
                                </div>
                            </div>
                            <div class="avatar">
                                <div class="avatar-initial bg-label-success rounded">
                                    <div class="mdi mdi-account-check-outline mdi-24px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="me-1">
                                <p class="text-heading mb-2">Active Customers</p>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-2 me-1 display-6">19,860</h4>
                                </div>
                            </div>
                            <div class="avatar">
                                <div class="avatar-initial bg-label-primary rounded">
                                    <div class="mdi mdi-account-outline mdi-24px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="me-1">
                                <p class="text-heading mb-2">Pending Users</p>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-2 me-1 display-6">237</h4>
                                </div>
                            </div>
                            <div class="avatar">
                                <div class="avatar-initial bg-label-warning rounded">
                                    <div class="mdi mdi-account-search mdi-24px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Users List Table -->
        @include('backend.components.alert')

        <div class="card">
            <div class="card-header border-bottom">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Agents Table</h5>
                    </div>
                    <div class="col d-flex" style="justify-content: end"> <button type="button" class="btn btn-primary"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd"><span
                                class="mdi mdi-plus"></span> &nbsp;Add Agent</button></div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table id="customer" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Agent</th>
                            <th>Contact</th>
                            <th>Identity</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $classes = ['bg-label-warning', 'bg-label-danger', 'bg-label-info', 'bg-label-primary', 'bg-label-secondary', 'bg-label-success'];
                        @endphp
                        @foreach ($agents as $index => $agent)
                        
                            <tr>
                                <td>{{ $agent->id }}</td>
                                <td>
                                    <div class="d-flex mb-3">
                                        <div class="avatar me-2 avatar-lg">
                                            <span
                                                class="avatar-initial rounded-circle {{ $classes[$index % count($classes)] }}">{{ $agent->identity }}</span>
                                        </div>
                                        <div class="flex-grow-1 row">
                                            <div class="col-9 mb-sm-0 mb-2">
                                                <h6 class="mb-0">{{ $agent->name }}
                                                </h6>
                                                <span>{{ $agent->email }}
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                </td>
                                <td>{{ $agent->phone }}</td>
                                <td>{{ strtoupper($agent->identity) }}</td>
                                <td>
                                    {{ $agent->location }}
                                </td>
                                <td>@if ($agent->status)
                                    <span class="badge rounded-pill bg-success">Active</span>
                                @else
                                    <span class="badge rounded-pill bg-warning">Diactive</span>
                                @endif</td>





                                <td>
                                    <div class="row">
                                        @if ($agent->status)
                                            <a href="{{ route('agents.diactive', ['id' => $agent->id]) }}"
                                                type="button"
                                                class="btn btn-icon btn-warning btn-fab demo waves-effect waves-light m-1">
                                                <i class="tf-icons mdi mdi-lock-outline"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('agents.active', ['id' => $agent->id]) }}" type="button"
                                                class="btn btn-icon btn-success btn-fab demo waves-effect waves-light m-1">
                                                <i class="tf-icons mdi mdi-lock-open-variant-outline"></i>
                                            </a>
                                        @endif

                                        <button type="button" onclick="openSweetAlert({{ $agent->id }})"
                                            class="btn btn-icon btn-danger btn-fab demo waves-effect waves-light m-1">
                                            <i class="tf-icons mdi mdi-trash-can-outline"></i>
                                        </button>

                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- <div class="card-datatable table-responsive">
                <table class="datatables-users table">

                    <thead class="table-light">
                        <tr>
                            <th></th>
                            <th></th>
                            <th>User</th>
                            <th>Role</th>
                            <th>Plan</th>
                            <th>Billing</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>sadfsdf</td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
            <!-- Offcanvas to add new user -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add Agent</h5>
                    <button id="btnClose" type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body mx-0 flex-grow-0 h-100">

                    <form class="add-new-user pt-0" method="POST" action="{{ route('agents.save') }}"
                        enctype="multipart/form-data">
                        @csrf




                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="add-user-firstname" placeholder="John Doe"
                                name="name" aria-label="John Doe" value="{{ old('name') }}" />
                            <label for="add-user-name">Name</label>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" id="add-user-email" class="form-control"
                                placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email"
                                value="{{ old('email') }}" />
                            <label for="add-user-email">Email</label>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" id="add-user-contact" class="form-control phone-mask"
                                placeholder="+44 75 032 88 488" aria-label="john.doe@example.com" name="contact"
                                value="{{ old('contact') }}" />
                            <label for="add-user-contact">Contact</label>
                            @error('contact')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" id="add-agent-identity" class="form-control" placeholder="WD"
                                aria-label="wd" name="identity" value="{{ old('identity') }}" />
                            <label for="add-agent-identity">Identity</label>
                            @error('identity')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" id="add-agent-location" class="form-control" placeholder="Manchester"
                                aria-label="jdoe1" name="location" value="{{ old('location') }}" />
                            <label for="add-agent-location">Location</label>
                            @error('location')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-4">
                            <input type="password" id="add-password" class="form-control" placeholder="*********"
                                name="password" />
                            <label for="add-password">Password</label>
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="password" id="add-confirm-password" class="form-control" placeholder="********"
                                name="password_confirmation" />
                            <label for="add-confirm-password"> Confirm Password</label>
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>

                    </form>
                </div>
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

@push('scripts')
    <script>
        // datatable 
        $(document).ready(function() {
            $('#customer').DataTable();
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

                    fetch(`/agents/delete/${$id}`, {
                            method: 'GET',
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.message === 'Agent deleted successfully') {
                                Swal.fire('Deleted!', 'The item has been deleted.', 'success');
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
    </script>
@endpush
