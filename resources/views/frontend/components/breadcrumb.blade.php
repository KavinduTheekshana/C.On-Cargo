<div class="breadcrumb-area" style="background-image:url(@yield('page_img'))">
    <div class=" pt-230 pb-240 breadcrumb-overlay">
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
</div>
