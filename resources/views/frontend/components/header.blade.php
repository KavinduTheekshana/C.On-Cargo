<header>
    <div id="sticky-header" class="main-menu-area menu-padding pl-55 pr-55">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-3">
                    <div class="header-left mr-40">
                        <div class="logo logo-mt f-left">
                            <a href="/"><img width="200px" src="{{ asset('frontend/assets/img/logo/logo.svg')}}" alt="" /></a>
                        </div>

                    </div>
                </div>
                <div class="col-xl-8 col-lg-9">
                    <div class="header-right f-right d-none d-lg-block">
                        <div class="header-info f-right">
                            <span><i class="far fa-phone"></i>+44 75 032 88 488</span>
                        </div>
                        <div class="header-right-img f-right">
                            <img src="{{ asset('frontend/assets/img/shape/line-1.png')}}" alt="">
                        </div>
                        <div class="search-icon f-right d-none d-lg-block">
                            <a href="#" data-toggle="modal" data-target="#search-modal"><i class="far fa-search"></i></a>
                        </div>
                    </div>
                    <div class="main-menu text-right">
                        <nav id="mobile-menu">
                            <ul>
                                <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('/') }}">Home </a></li>
                                <li class="{{ request()->is('about') ? 'active' : '' }}"><a href="{{ route('about') }}">About </a></li>
                                <li class="{{ request()->is('services') ? 'active' : '' }}"><a href="{{ route('services') }}">Services </a></li>
                                <li class="{{ request()->is('tracking') ? 'active' : '' }}"><a href="{{ route('/') }}">Tracking </a></li>
                                <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact </a></li>
                                @auth
                                @if (Auth::user()->role == 2)
                                    <!-- Dashboard Button for Regular Users -->
                                    <li class="{{ request()->is('user/dashboard') ? 'active' : '' }}"><a href="{{ route('user/dashboard') }}">Dashboard </a></li>
                                @endif
                            @endauth

                            @guest
                                <!-- Login Button for Guests -->
                                <li class="{{ request()->is('user/login') ? 'active' : '' }}"><a href="{{ route('user/login') }}">Login </a></li>
                            @endguest


                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mobile-menu"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="extra-info">
        <div class="close-icon">
            <button>
                <i class="far fa-window-close"></i>
            </button>
        </div>
        <div class="logo-side mb-30">
            <a href="index.html">
                <img src="assets/img/logo/white.png" alt="" />
            </a>
        </div>
        <div class="side-info mb-30">
            <div class="contact-list mb-30">
                <h4>Office Address</h4>
                <p>123/A, Miranda City Likaoli
                    Prikano, Dope</p>
            </div>
            <div class="contact-list mb-30">
                <h4>Phone Number</h4>
                <p>+0989 7876 9865 9</p>
                <p>+(090) 8765 86543 85</p>
            </div>
            <div class="contact-list mb-30">
                <h4>Email Address</h4>
                <p>info@example.com</p>
                <p>example.mail@hum.com</p>
            </div>
        </div>
        <div class="instagram">
            <a href="#">
                <img src="assets/img/portfolio/p1.jpg" alt="">
            </a>
            <a href="#">
                <img src="assets/img/portfolio/p2.jpg" alt="">
            </a>
            <a href="#">
                <img src="assets/img/portfolio/p3.jpg" alt="">
            </a>
            <a href="#">
                <img src="assets/img/portfolio/p4.jpg" alt="">
            </a>
            <a href="#">
                <img src="assets/img/portfolio/p5.jpg" alt="">
            </a>
            <a href="#">
                <img src="assets/img/portfolio/p6.jpg" alt="">
            </a>
        </div>
        <div class="social-icon-right mt-20">
            <a href="#">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#">
                <i class="fab fa-google-plus-g"></i>
            </a>
            <a href="#">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
    </div>
</header>