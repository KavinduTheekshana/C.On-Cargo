<footer>
    <div class="footer-top-area black-bg pt-50 pb-50">
        <div class="container">
            <div class="pt-60">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-logo mb-30">
                            <a href="{{ route('/') }}"><img style="max-width: 80%"
                                    src="{{ asset('frontend/assets/img/logo/logolightcargo.svg') }}" alt=""></a>
                            <div class="footer-text mt-20">
                                <p>C-ON Group (Pvt) Ltd, trading as C-ON Cargo, is a trusted cargo service company
                                    specializing in seamless transportation solutions. With years of experience and a
                                    global network, we are committed to delivering your cargo safely and on time. Your
                                    success is our priority.
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-wrapper mb-30">
                            <h3 class="footer-title">Quick Links</h3>
                            <div class="footer-link ml-10">
                                <ul>
                                    <li><a href="{{ route('/') }}">- Home</a></li>
                                    <li><a href="{{ route('about') }}">- About</a></li>
                                    <li><a href="{{ route('services') }}">- Services</a></li>
                                    <li><a href="{{ route('contact') }}">- Contact Us</a></li>
                                    @auth
                                        @if (Auth::user()->role == 2)
                                            <!-- Dashboard Button for Regular Users -->
                                            <li><a href="{{ route('user/dashboard') }}">- Dashboard</a></li>
                                        @endif
                                    @endauth

                                    @guest
                                        <li><a href="{{ route('user/login') }}">- Login</a></li>
                                    @endguest
                                    <li><a href="{{ route('terms') }}">- Terms</a></li>
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
                                        <span>+44 75 032 88 488</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-address-icon">
                                        <i class="far fa-envelope-open"></i>
                                    </div>
                                    <div class="contact-address-text">
                                        <span>info@concargo.co.uk</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-address-icon">
                                        <i class="far fa-map-marker-alt"></i>
                                    </div>
                                    <div class="contact-address-text">
                                        <span>12 King Arthur Ct,<br>
                                            Waltham Cross<br>
                                            EN8 8EH</span>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-wrapper mb-30">
                            <h3 class="footer-title">Social Media</h3>

                            <div class="footer-icon">
                                <a href="https://www.facebook.com/C.ONcargoLtd" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://instagram.com/c.oncargoltd?igshid=MzMyNGUyNmU2YQ==" target="_blank"><i
                                        class="fab fa-instagram"></i></a>
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
                        <p>Copyright <i class="far fa-copyright"></i> {{ now()->year }} C-ON Cargo (Pvt) Ltd. All
                            Rights Reserved | Design & Developed By <a href="https://neuroon.lk"> Neuroon Informatics</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
