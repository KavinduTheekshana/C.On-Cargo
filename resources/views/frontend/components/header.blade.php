<header>
    <div id="sticky-header" class="main-menu-area menu-padding pl-55 pr-55">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-3">
                    <div class="header-left mr-40">
                        <div class="logo logo-mt f-left">
                            <a href="/"><img width="200px" src="{{ asset('frontend/assets/img/logo/logo.svg') }}"
                                    alt="" /></a>
                        </div>

                    </div>
                </div>
                <div class="col-xl-8 col-lg-9">
                    <div class="header-right f-right d-none d-lg-block">
                        <div class="header-info f-right">
                            <span><i class="far fa-phone"></i>+44 7503 288 488</span>
                        </div>
                        <div class="header-right-img f-right">
                            <img src="{{ asset('frontend/assets/img/shape/line-1.png') }}" alt="">
                        </div>
                        <div class="search-icon f-right d-none d-lg-block">
                            <a href="#" data-toggle="modal" data-target="#search-modal"><i
                                    class="far fa-search"></i></a>
                        </div>
                    </div>
                    <div class="main-menu text-right">
                        <nav id="mobile-menu">
                            <ul>
                                <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('/') }}">Home
                                    </a></li>
                                <li class="{{ request()->is('about') ? 'active' : '' }}"><a
                                        href="{{ route('about') }}">About </a></li>
                                <li class="{{ request()->is('services') ? 'active' : '' }}"><a
                                        href="{{ route('services') }}">Services </a></li>
                                <li class="{{ request()->is('user/tracking') ? 'active' : '' }}"><a href="{{ route('user.tracking') }}">Tracking </a></li>
                                <li class="{{ request()->is('contact') ? 'active' : '' }}"><a
                                        href="{{ route('contact') }}">Contact </a></li>
                                @auth
                                    @if (Auth::user()->role == 2)
                                        <!-- Dashboard Button for Regular Users -->
                                        <li class="{{ request()->is('user/dashboard') ? 'active' : '' }}"><a
                                                href="{{ route('user/dashboard') }}">Dashboard </a></li>
                                    @endif
                                @endauth

                                @guest
                                    <!-- Login Button for Guests -->
                                    <li class="{{ request()->is('user/login') ? 'active' : '' }}"><a
                                            href="{{ route('user/login') }}">Login </a></li>
                                @endguest


                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-12 p-0">
                    <div class="mobile-menu"></div>
                </div>
            </div>
        </div>
    </div>

</header>
