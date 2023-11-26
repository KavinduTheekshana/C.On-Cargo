<div class="breadcrumb-area pt-130 pb-140" style="background-image:url(@yield('page_img'))">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-text text-center">
                    <h1>@yield('page_name')</h1>
                    <ul class="breadcrumb-menu">
                        <li><a href="{{ route('/') }}">home</a></li>
                        <li><span>@yield('page_name')</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>