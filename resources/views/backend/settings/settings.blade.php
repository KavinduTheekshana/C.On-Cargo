@extends('layouts.backend')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Users List Table -->
        @include('backend.components.alert')

        <div class="card">
            <div class="col-md-12">
                <h4 class="card-header">Quote Settings</h4>
                <div class="card-body">
                    <h5>United Kingdom to Sri Lanka Personal</h5>
                    <div class="table-responsive text-nowrap">
                        <form method="POST" action="{{ route('settings.update.uktoslp') }}">
                            @csrf
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Weight (kg)</th>
                                        <th>Warehouse to Warehouse</th>
                                        <th>Door to Door West Provience</th>
                                        <th>Door to Door Out of West Provience</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($settings as $setting)
                                        <tr>
                                            <td>{{ $setting->id }}</td>
                                            <td><input type="number" step=".01" class="form-control"
                                                    name="uk2slwh2whP[]" value="{{ $setting->uk2slwh2whP }}"></td>
                                            <td><input type="number" step=".01" class="form-control"
                                                    name="uk2sld2dwpP[]" value="{{ $setting->uk2sld2dwpP }}"></td>
                                            <td><input type="number" step=".01" class="form-control"
                                                    name="uk2sld2dowpP[]" value="{{ $setting->uk2sld2dowpP }}"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit"
                                class="float-right mt-2 mb-2 btn btn-warning waves-effect waves-light">Update Table</button>
                        </form>
                    </div>

                    <hr>
                    <br>

                    <h5>United Kingdom to Sri Lanka Commercial</h5>
                    <div class="table-responsive text-nowrap">
                        <form method="POST" action="{{ route('settings.update.sltoukc') }}">
                            @csrf
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Weight (kg)</th>
                                        <th>Warehouse to Warehouse</th>
                                        <th>Door to Door West Provience</th>
                                        <th>Door to Door Out of West Provience</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($settings as $setting)
                                        <tr>
                                            <td>{{ $setting->id }}</td>
                                            <td><input type="number" step=".01" class="form-control"
                                                    name="uk2slwh2whC[]" value="{{ $setting->uk2slwh2whC }}"></td>
                                            <td><input type="number" step=".01" class="form-control"
                                                    name="uk2sld2dwpC[]" value="{{ $setting->uk2sld2dwpC }}"></td>
                                            <td><input type="number" step=".01" class="form-control"
                                                    name="uk2sld2dowpC[]" value="{{ $setting->uk2sld2dowpC }}"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit"
                                class="float-right mt-2 mb-2 btn btn-warning waves-effect waves-light">Update Table</button>
                        </form>
                    </div>

                    <hr>
                    <br>

                    <div class="row">
                        <div class="col-6">
                            <h5>Sri Lanka to United Kingdom</h5>
                            <div class="table-responsive text-nowrap">
                                <form method="POST" action="{{ route('settings.update.sltouk') }}">
                                    @csrf
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Weight (kg)</th>
                                                <th>Door to Door</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($settings as $setting)
                                                <tr>
                                                    <td>{{ $setting->id }}</td>
                                                    <td><input type="number" step=".01" class="form-control"
                                                            name="sl2ukd2d[]" value="{{ $setting->sl2ukd2d }}"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button type="submit"
                                        class="float-right mt-2 mb-2 btn btn-warning waves-effect waves-light">Update
                                        Table</button>
                                </form>
                            </div>
                        </div>

                        <div class="col-6"></div>
                    </div>


                    <hr>
                    <br>

                    <div class="row">
                        <div class="col-6">
                            <h5>Sri Lanka to France</h5>
                            <div class="table-responsive text-nowrap">
                                <form method="POST" action="{{ route('settings.update.sltofr') }}">
                                    @csrf
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Weight (kg)</th>
                                                <th>Door to Door</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($settings as $setting)
                                                <tr>
                                                    <td>{{ $setting->id }}</td>
                                                    <td><input type="number" step=".01" class="form-control"
                                                            name="sl2frd2d[]" value="{{ $setting->sl2frd2d }}"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button type="submit"
                                        class="float-right mt-2 mb-2 btn btn-warning waves-effect waves-light">Update
                                        Table</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-6">

                            <h5>France to Sri Lanka</h5>
                            <div class="table-responsive text-nowrap">
                                <form method="POST" action="{{ route('settings.update.frtosl') }}">
                                    @csrf
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Weight (kg)</th>
                                                <th>Door to Door</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($settings as $setting)
                                                <tr>
                                                    <td>{{ $setting->id }}</td>
                                                    <td><input type="number" step=".01" class="form-control"
                                                            name="fr2sld2d[]" value="{{ $setting->fr2sld2d }}"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button type="submit"
                                        class="float-right mt-2 mb-2 btn btn-warning waves-effect waves-light">Update
                                        Table</button>
                                </form>
                            </div>

                        </div>
                    </div>

                    <hr><br>

                    <div class="row">
                        <div class="col-6">
                            <h5>Sri Lanka to Italy</h5>
                            <div class="table-responsive text-nowrap">
                                <form method="POST" action="{{ route('settings.update.sltoit') }}">
                                    @csrf
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Weight (kg)</th>
                                                <th>Door to Door</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($settings as $setting)
                                                <tr>
                                                    <td>{{ $setting->id }}</td>
                                                    <td><input type="number" step=".01" class="form-control"
                                                            name="sl2itd2d[]" value="{{ $setting->sl2itd2d }}"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button type="submit"
                                        class="float-right mt-2 mb-2 btn btn-warning waves-effect waves-light">Update
                                        Table</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-6">
                            <h5>Italy to Sri Lanka </h5>
                            <div class="table-responsive text-nowrap">
                                <form method="POST" action="{{ route('settings.update.ittosl') }}">
                                    @csrf
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Weight (kg)</th>
                                                <th>Door to Door</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($settings as $setting)
                                                <tr>
                                                    <td>{{ $setting->id }}</td>
                                                    <td><input type="number" step=".01" class="form-control"
                                                            name="it2sld2d[]" value="{{ $setting->it2sld2d }}"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button type="submit"
                                        class="float-right mt-2 mb-2 btn btn-warning waves-effect waves-light">Update
                                        Table</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-6">

                            <h5>Sri Lanka to Canada</h5>
                            <div class="table-responsive text-nowrap">
                                <form method="POST" action="{{ route('settings.update.sltoca') }}">
                                    @csrf
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Weight (kg)</th>
                                                <th>Door to Door</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($settings as $setting)
                                                <tr>
                                                    <td>{{ $setting->id }}</td>
                                                    <td><input type="number" step=".01" class="form-control"
                                                            name="sl2cad2d[]" value="{{ $setting->sl2cad2d }}"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button type="submit"
                                        class="float-right mt-2 mb-2 btn btn-warning waves-effect waves-light">Update
                                        Table</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-6">
                            <h5>Canada to Sri Lanka</h5>
                            <div class="table-responsive text-nowrap">
                                <form method="POST" action="{{ route('settings.update.catosl') }}">
                                    @csrf
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Weight (kg)</th>
                                                <th>Door to Door</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($settings as $setting)
                                                <tr>
                                                    <td>{{ $setting->id }}</td>
                                                    <td><input type="number" step=".01" class="form-control"
                                                            name="ca2sld2d[]" value="{{ $setting->ca2sld2d }}"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button type="submit"
                                        class="float-right mt-2 mb-2 btn btn-warning waves-effect waves-light">Update
                                        Table</button>
                                </form>
                            </div>
                        </div>
                    </div>





                    {{-- <form action="{{ route('settings.update')}}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <p>Sri Lanka To UK First 5KG Price Chart</p>
                            <div class="col-4">
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">1st KG</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        name="sltouk1kg" value="{{ $settings->sltouk1kg }}" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">2nd KG</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        name="sltouk2kg" value="{{ $settings->sltouk2kg }}" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">3rd KG</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        name="sltouk3kg" value="{{ $settings->sltouk3kg }}" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">4th KG</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        name="sltouk4kg" value="{{ $settings->sltouk4kg }}" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">5th KG</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        name="sltouk5kg" value="{{ $settings->sltouk5kg }}" />
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <p>UK To Sri Lanka First 5KG Price Chart</p>
                            <div class="col-4">
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">1st KG</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        name="uktosl1kg" value="{{ $settings->uktosl1kg }}" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">2nd KG</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        name="uktosl2kg" value="{{ $settings->uktosl2kg }}" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">3rd KG</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        name="uktosl3kg" value="{{ $settings->uktosl3kg }}" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">4th KG</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        name="uktosl4kg" value="{{ $settings->uktosl4kg }}" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">5th KG</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        name="uktosl5kg" value="{{ $settings->uktosl5kg }}" />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">Sri Lanka to UK Per KG Price</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        name="sltoukpkg" value="{{ $settings->sltoukpkg }}" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">UK to Sri Lanka Per KG Price
                                        (Personal)</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        name="uktoslpkgpersonal" value="{{ $settings->uktoslpkgpersonal }}" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">UK to Sri Lanka Per KG Price
                                        (Commercial)</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        name="uktoslpkgcommercial" value="{{ $settings->uktoslpkgcommercial }}" />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">Sri Lanka to UK Delivery and collection fee
                                        less than 12kg</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        name="sltoukdeandcolless12" value="{{ $settings->sltoukdeandcolless12 }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">Sri Lanka to UK Delivery and collection fee
                                        more than 12kg</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        name="sltoukdeandcolmore12" value="{{ $settings->sltoukdeandcolmore12 }}" />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">UK to Sri Lanka delivery and collection fee
                                        less than 20kg Western Provience</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        name="uktosldeandcolless20wp" value="{{ $settings->uktosldeandcolless20wp }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">UK to Sri Lanka delivery and collection fee
                                        more than 20kg Western Provience</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        name="uktosldeandcolmore20wp" value="{{ $settings->uktosldeandcolmore20wp }}" />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">UK to Sri Lanka delivery and collection fee
                                        less than 20kg Out of Western Provience</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        name="uktosldeandcolless20owp"
                                        value="{{ $settings->uktosldeandcolless20owp }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-2 mb-3">
                                    <label for="largeInput" class="form-label">UK to Sri Lanka delivery and collection fee
                                        more than 20kg Out of Western Provience</label>
                                    <input id="largeInput" class="form-control form-control-lg" type="text"
                                        name="uktosldeandcolmore20owp"
                                        value="{{ $settings->uktosldeandcolmore20owp }}" />
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Update Quote Settings</button>
                    </form> --}}
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
