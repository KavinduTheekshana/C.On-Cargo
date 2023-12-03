@extends('layouts.backend')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Users List Table -->
        @include('backend.components.alert')

        <div class="card">
            <div class="col-md-12">
                <h5 class="card-header">Quote Settings</h5>
                <div class="card-body">
                    <div class="row mb-4">
                        <p>Sri Lanka To UK First 5KG Price Chart</p>
                        <div class="col-4">
                            <div class="mt-2 mb-3">
                                <label for="largeInput" class="form-label">1st KG</label>
                                <input id="largeInput" class="form-control form-control-lg" type="text" placeholder="" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mt-2 mb-3">
                                <label for="largeInput" class="form-label">2nd KG</label>
                                <input id="largeInput" class="form-control form-control-lg" type="text" placeholder="" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mt-2 mb-3">
                                <label for="largeInput" class="form-label">3rd KG</label>
                                <input id="largeInput" class="form-control form-control-lg" type="text" placeholder="" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mt-2 mb-3">
                                <label for="largeInput" class="form-label">4th KG</label>
                                <input id="largeInput" class="form-control form-control-lg" type="text" placeholder="" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mt-2 mb-3">
                                <label for="largeInput" class="form-label">5th KG</label>
                                <input id="largeInput" class="form-control form-control-lg" type="text" placeholder="" />
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <p>UK To Sri Lanka First 5KG Price Chart</p>
                        <div class="col-4">
                            <div class="mt-2 mb-3">
                                <label for="largeInput" class="form-label">1st KG</label>
                                <input id="largeInput" class="form-control form-control-lg" type="text" placeholder="" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mt-2 mb-3">
                                <label for="largeInput" class="form-label">2nd KG</label>
                                <input id="largeInput" class="form-control form-control-lg" type="text" placeholder="" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mt-2 mb-3">
                                <label for="largeInput" class="form-label">3rd KG</label>
                                <input id="largeInput" class="form-control form-control-lg" type="text" placeholder="" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mt-2 mb-3">
                                <label for="largeInput" class="form-label">4th KG</label>
                                <input id="largeInput" class="form-control form-control-lg" type="text" placeholder="" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mt-2 mb-3">
                                <label for="largeInput" class="form-label">5th KG</label>
                                <input id="largeInput" class="form-control form-control-lg" type="text" placeholder="" />
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <div class="mt-2 mb-3">
                                <label for="largeInput" class="form-label">Sri Lanka to UK Per KG Price</label>
                                <input id="largeInput" class="form-control form-control-lg" type="text" placeholder="" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-2 mb-3">
                                <label for="largeInput" class="form-label">UK to Sri Lanka Per KG Price</label>
                                <input id="largeInput" class="form-control form-control-lg" type="text"
                                    placeholder="" />
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <div class="mt-2 mb-3">
                                <label for="largeInput" class="form-label">Sri Lanka to UK Delivery and collection fee less than 12kg</label>
                                <input id="largeInput" class="form-control form-control-lg" type="text" placeholder="" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-2 mb-3">
                                <label for="largeInput" class="form-label">Sri Lanka to UK Delivery and collection fee more than 12kg</label>
                                <input id="largeInput" class="form-control form-control-lg" type="text"
                                    placeholder="" />
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <div class="mt-2 mb-3">
                                <label for="largeInput" class="form-label">UK to Sri Lanka delivery and collection fee less than 20kg Western Provience</label>
                                <input id="largeInput" class="form-control form-control-lg" type="text" placeholder="" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-2 mb-3">
                                <label for="largeInput" class="form-label">UK to Sri Lanka delivery and collection fee more than 20kg Western Provience</label>
                                <input id="largeInput" class="form-control form-control-lg" type="text"
                                    placeholder="" />
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <div class="mt-2 mb-3">
                                <label for="largeInput" class="form-label">UK to Sri Lanka delivery and collection fee less than 20kg Out of Western Provience</label>
                                <input id="largeInput" class="form-control form-control-lg" type="text" placeholder="" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-2 mb-3">
                                <label for="largeInput" class="form-label">UK to Sri Lanka delivery and collection fee more than 20kg Out of Western Provience</label>
                                <input id="largeInput" class="form-control form-control-lg" type="text"
                                    placeholder="" />
                            </div>
                        </div>
                    </div>

                </div>




            </div>

        </div>

        <!-- Offcanvas to add new user -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add Customers</h5>
                <button id="btnClose" type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0 h-100">

                <form class="add-new-user pt-0" method="POST" action="{{ route('customer.save') }}"
                    enctype="multipart/form-data">
                    @csrf




                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="add-user-firstname" placeholder="John"
                            name="firstname" aria-label="John" value="{{ old('firstname') }}" />
                        <label for="add-user-firstname">First Name</label>
                        @error('firstname')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="add-user-lastname" placeholder="Doe"
                            name="lastname" aria-label="Doe" value="{{ old('lastname') }}" />
                        <label for="add-user-lastname">Last Name</label>
                        @error('lastname')
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
                        <input type="text" id="add-user-address" class="form-control"
                            placeholder="12 King Arthur Ct,Waltham Cross" aria-label="jdoe1" name="address"
                            value="{{ old('address') }}" />
                        <label for="add-user-company">Address</label>
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" id="add-user-postcode" class="form-control" placeholder="EN8 8EH"
                            aria-label="jdoe1" name="postcode" value="{{ old('postcode') }}" />
                        <label for="add-user-company">Post Code</label>
                        @error('postcode')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <select name="country" id="country" class="select2 form-select">
                            <option value="">Select</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="United Kingdom">United Kingdom</option>
                        </select>
                        <label for="country">Country</label>
                        @error('country')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>

                </form>
            </div>
        </div>

        {{-- Update Customer  --}}
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd2" aria-labelledby="offcanvasEndLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Update Customers</h5>
                <button id="btnClose" type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0 h-100">

                <form class="add-new-user pt-0" method="POST" action="{{ route('customer.update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="id" name="customer_id" value="">
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="add-customer-firstname" placeholder="John"
                            name="customer_firstname" aria-label="John" value="{{ old('firstname') }}" />
                        <label for="add-customer-firstname">First Name</label>
                        @error('firstname')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="add-customer-lastname" placeholder="Doe"
                            name="customer_lastname" aria-label="Doe" value="{{ old('lastname') }}" />
                        <label for="add-customer-lastname">Last Name</label>
                        @error('lastname')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" id="add-customer-email" class="form-control"
                            placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="customer_email"
                            value="{{ old('email') }}" />
                        <label for="add-customer-email">Email</label>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" id="add-customer-contact" class="form-control phone-mask"
                            placeholder="+44 75 032 88 488" aria-label="john.doe@example.com" name="customer_contact"
                            value="{{ old('contact') }}" />
                        <label for="add-customer-contact">Contact</label>
                        @error('contact')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" id="add-customer-address" class="form-control"
                            placeholder="12 King Arthur Ct,Waltham Cross" aria-label="jdoe1" name="customer_address"
                            value="{{ old('address') }}" />
                        <label for="add-customer-company">Address</label>
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" id="add-customer-postcode" class="form-control" placeholder="EN8 8EH"
                            aria-label="jdoe1" name="customer_postcode" value="{{ old('postcode') }}" />
                        <label for="add-customer-company">Post Code</label>
                        @error('postcode')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating form-floating-outline mb-4">
                        <select name="customer_country" id="customer_country" class="select form-select">
                            <option value="">Select</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="United Kingdom">United Kingdom</option>
                        </select>
                        <label for="customer_country">Country</label>
                        @error('customer_country')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Update</button>

                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- / Content -->

    {{-- Modal  --}}
    <div class="modal fade" id="addNewAddress" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-simple modal-add-new-address">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body p-md-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div id="invoiceDetails"></div>

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
@endpush
