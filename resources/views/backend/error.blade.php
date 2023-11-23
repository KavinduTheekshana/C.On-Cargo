<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="{{ asset('/backend/assets') . '/' }}"
    data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>C.ON Cargo - Your Trusted Cargo Partner</title>

    <meta name="description" content="" />


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/img/conlogoicon.svg') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/materialdesignicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/node-waves/node-waves.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/rtl/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/rtl/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />



    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/pages/page-misc.css') }}" />


    <!-- Helpers -->
    <script src="{{ asset('backend/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/js/template-customizer.js') }}"></script>
    <script src="{{ asset('backend/assets/js/config.js') }}"></script>
    @vite('resources/js/app.js')
</head>



<!-- Content -->

<!-- Error -->
<div class="misc-wrapper">
    <h1 class="mb-2 mx-2" style="font-size: 6rem">404</h1>
    <h4 class="mb-2">Page Not Found ⚠️</h4>
    @if (session('error'))
        <p class="mb-4 mx-2">
            {{ session('error') }}
        </p>
    @endif

    <div class="d-flex justify-content-center mt-5">
        <img src="{{ asset('backend/assets/img/illustrations/misc-error-object.png') }}" alt="misc-error"
            class="img-fluid misc-object d-none d-lg-inline-block" width="160" />
        <img src="{{ asset('backend/assets/img/illustrations/misc-bg-light.png') }}" alt="misc-error"
            class="misc-bg d-none d-lg-inline-block" data-app-light-img="illustrations/misc-bg-light.png"
            data-app-dark-img="illustrations/misc-bg-dark.png" />
        <div class="d-flex flex-column align-items-center">
            <img src="{{ asset('backend/assets/img/illustrations/misc-error-illustration.png') }}" alt="misc-error"
                class="img-fluid zindex-1" width="190" />
            <div>
                <a href="{{ route('logout') }}" class="btn btn-primary text-center my-4">Back to Login</a>
            </div>
        </div>
    </div>
</div>
<!-- /Error -->
<!-- / Content -->
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('backend/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/libs/i18n/i18n.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/js/menu.js') }}"></script>
<script src="{{ asset('backend/assets/js/main.js') }}"></script>
</body>

</html>
