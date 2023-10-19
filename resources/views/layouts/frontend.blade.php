<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>C.ON Cargo - Your Trusted Cargo Partner</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img/conlogoicon.svg') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
    {{-- Anim Trap  --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugin/animtrap/css/animtrap.css') }}">
    
@vite('resources/js/app.js')
</head>

<body>

    <!-- header-start -->
    @include('frontend.components.header')
    <!-- header-start -->
    @yield('content')

    <!-- footer-area-start -->
    <footer>
        <div class="footer-top-area black-bg pt-80 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-logo mb-30">
                            <a href="index.html"><img src="assets/img/logo/white-logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="header-top-wrapper mb-30">
                            <div class="header-address-icon">
                                <i class="fal fa-bells"></i>
                            </div>
                            <div class="header-address-text">
                                <h4>Want To Work With Us?</h4>
                                <div class="b-button b-02-button">
                                    <a href="about.html">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="header-top-wrapper mb-30">
                            <div class="header-address-icon">
                                <i class="fal fa-files-medical"></i>
                            </div>
                            <div class="header-address-text">
                                <h4>Make An Appointment</h4>
                                <div class="b-button b-02-button">
                                    <a href="contact.html">Request a quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="header-top-wrapper">
                            <div class="header-address-icon">
                                <i class="fal fa-headset"></i>
                            </div>
                            <div class="header-address-text">
                                <h4>Need Any Help ?</h4>
                                <div class="b-button b-02-button">
                                    <a href="contact.html">contact us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-middle-area mt-50 pt-60">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-6">
                            <div class="footer-wrapper mb-30">
                                <h3 class="footer-title">Company</h3>
                                <div class="footer-link">
                                    <ul>
                                        <li><a href="about.html">About Company</a></li>
                                        <li><a href="our-history.html">Our History</a></li>
                                        <li><a href="about.html">Company Achievement</a></li>
                                        <li><a href="team.html">Meet The Team</a></li>
                                        <li><a href="about.html">Success Story</a></li>
                                    </ul>
                                </div>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6">
                            <div class="footer-wrapper mb-30">
                                <h3 class="footer-title">Quick Links</h3>
                                <div class="footer-link">
                                    <ul>
                                        <li><a href="services-01.html">Popualar Services</a></li>
                                        <li><a href="contact.html">Make An Appointment</a></li>
                                        <li><a href="contact.html">Newsletters Subscribe</a></li>
                                        <li><a href="blog.html">Latest News</a></li>
                                        <li><a href="about.html">Become A Member</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6">
                            <div class="footer-wrapper mb-30">
                                <h3 class="footer-title">Contact Us</h3>
                                <ul class="contact-link">
                                    <li>
                                        <div class="contact-address-icon">
                                            <i class="far fa-phone"></i>
                                        </div>
                                        <div class="contact-address-text">
                                            <span>+012 (345) 556 99</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact-address-icon">
                                            <i class="far fa-envelope-open"></i>
                                        </div>
                                        <div class="contact-address-text">
                                            <span>support@gmail.com</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact-address-icon">
                                            <i class="far fa-map-marker-alt"></i>
                                        </div>
                                        <div class="contact-address-text">
                                            <span>North Avenue, <br> Chicago, IL, 55030</span>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6">
                            <div class="footer-wrapper mb-30">
                                <h3 class="footer-title">About Us</h3>
                                <div class="footer-text">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        dolorem que laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                        veritatis</p>
                                </div>
                                <div class="footer-icon">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area black-soft-bg pt-25 pb-25">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="copyright text-center">
                            <p>Copyright <i class="far fa-copyright"></i> 2020 <a href="#">Logio</a>. All Rights
                                Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-area-end -->

    <!-- Modal Search -->
    <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <input type="text" placeholder="Search here...">
                    <button>
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>




    <!-- JS here -->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>


    <script src="{{ asset('frontend/assets/plugin/animtrap/js/anim-effect.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugin/animtrap/js/anim-scroll.js') }}"></script>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo_pcAdFNbTDCAvMwAD19oRTuEmb9M50c"></script>

    
    <script>
       ANIMSCROLL.init({
        easing: 'ease-in-out-sine'
    });
    </script>
</body>

</html>
