{{-- <div class="slider-area">
    <div class="slider-active">
        <div class="single-slider slider-height d-flex align-items-center" style="background-image:url({{ asset('frontend/assets/img/slider/icons8-team-yTwXpLO5HAA-unsplash2.jpg')}})">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-10 ">
                        <div class="slider-content pos-rel">
                            <h1>C.ON</h1>
                            <h2 data-animation="fadeInLeft" data-delay=".3s">From the <span>UK</span> to <span>Sri Lanka</span> and back, we've got you covered.  </h2>
                            <div class="slider-button">
                                <a class="btn scroll-link" href="#quoteSection" data-animation="fadeInUp" data-delay=".5s">get Quote <i class="far fa-paper-plane"></i></a>
                                <a class="btn white-btn" href="#" data-animation="fadeInUp" data-delay=".7s">our services <i class="far fa-paper-plane"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider slider-height d-flex align-items-center" style="background-image:url({{ asset('frontend/assets/img/slider/0214.jpg')}})">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-10 ">
                        <div class="slider-content pos-rel">
                            <h1>C.ON</h1>
                            <h2 data-animation="fadeInLeft" data-delay=".3s">Your goods, <span>our expertise</span>, one reliable route.</h2>
                            <div class="slider-button">
                                <a class="btn scroll-link" href="#quoteSection" data-animation="fadeInUp" data-delay=".5s">get Quote <i class="far fa-paper-plane"></i></a>
                                <a class="btn white-btn" href="#" data-animation="fadeInUp" data-delay=".7s">our services <i class="far fa-paper-plane"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider slider-height d-flex align-items-center" style="background-image:url({{ asset('frontend/assets/img/slider/022.jpg')}})">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-10 ">
                        <div class="slider-content pos-rel">
                            <h1>C.ON</h1>
                            <h2 data-animation="fadeInLeft" data-delay=".3s">Trusted cargo services between the <span>UK</span> and <span>Sri Lanka.</span></h2>
                            <div class="slider-button">
                                <a class="btn scroll-link" href="#quoteSection" data-animation="fadeInUp" data-delay=".5s">get Quote <i class="far fa-paper-plane"></i></a>
                                <a class="btn white-btn" href="#" data-animation="fadeInUp" data-delay=".7s">our services <i class="far fa-paper-plane"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}



<div class="slider-area">
    <div class="slider-active slider-02-active">
        <div class="single-slider"
        style="background-image:url(frontend/assets/img/slider/thought-catalog-Nv-vx3kUR2A-unsplashnew.jpg)">
            <div class="slider-height d-flex align-items-center slider-overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider-content slider-02-content pos-rel text-center">
                                <h2 data-animation="fadeInUp" data-delay=".5s">Expanding Your Business Horizons <br> <span id="typing"></span></h2>
                                <div class="slider-button">
                                    <a class="btn scroll-link" href="#quoteSection"data-animation="fadeInUp" data-delay=".9s">get
                                        Quote <i class="far fa-paper-plane"></i></a>
                                    <a class="btn white-btn" href="{{route('services')}}" data-animation="fadeInUp"
                                        data-delay="1.1s">our services <i class="far fa-paper-plane"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider"
        style="background-image:url(frontend/assets/img/slider/linkedin-sales-solutions-oFMI6CdD7yU-unsplashsd.jpg)">

            <div class="slider-height d-flex align-items-center slider-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider-content slider-02-content pos-rel text-center">

                            <h2 data-animation="fadeInUp" data-delay=".5s">Your goods,our expertise, one reliable route.</h2>

                            <div class="slider-button">
                                <a class="btn scroll-link" href="#quoteSection"data-animation="fadeInUp" data-delay=".9s">get
                                    Quote <i class="far fa-paper-plane"></i></a>
                                <a class="btn white-btn" href="{{route('services')}}" data-animation="fadeInUp"
                                    data-delay="1.1s">our services <i class="far fa-paper-plane"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="single-slider"
            style="background-image:url(frontend/assets/img/slider/bruce-mars-8YG31Xn4dSw-unsplash12.jpg)">
            <div class="slider-height d-flex align-items-center slider-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider-content slider-02-content pos-rel text-center">

                            <h2 data-animation="fadeInUp" data-delay=".5s">World’s Best Transportation</h2>

                                <div class="slider-button">
                                    <a class="btn scroll-link" href="#quoteSection"data-animation="fadeInUp" data-delay=".9s">get
                                        Quote <i class="far fa-paper-plane"></i></a>
                                    <a class="btn white-btn" href="{{route('services')}}" data-animation="fadeInUp"
                                        data-delay="1.1s">our services <i class="far fa-paper-plane"></i></a>
                                </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        // these phrases will repeat
        const phrases = [
            "Sri Lanka",
            "United Kingdom",
            "India",
            "France"
        ];

        // start with initial random phrase from the collection
        // Math.floor reduces float to integer
        let currentPhrase = Math.floor(Math.random() * (phrases.length - 1));
        let currentChar = 20;
        // this element has the typing line
        let typingLine = document.getElementById("typing");

        // type() the phrase char-by-char
        //
        function type() {
            // write sub-string to the element
            typingLine.textContent = phrases[currentPhrase].slice(0, ++currentChar);

            // continue to write until we run out of phrase-chars
            if (currentChar < phrases[currentPhrase].length) {
                // slow down the animation
                setTimeout(function() {
                    // animates the changes to DOM
                    requestAnimationFrame(type);
                }, 25);
            } else {
                // we ran out of phrase length
                // now wait 2 seconds
                // then call "erase" method to start erasing
                setTimeout(erase, 2000);
            }
        }

        // erase() characters one-by-one
        //
        function erase() {
            // reduce one char, assign to the element
            typingLine.textContent = phrases[currentPhrase].slice(0, --currentChar);

            // we still have more chars to erase
            if (currentChar > 1) {
                // pause 25ms, then animate the element rendering
                setTimeout(function() {
                    requestAnimationFrame(erase);
                }, 25);
            } else {
                // we ran out of chars for current phrase
                // reset to first char
                currentChar = 0;
                // move to the next phrase
                // "%" ensures endless loop within phrases
                currentPhrase = (currentPhrase + 1) % phrases.length;
                // all erased? now start "typing" again
                setTimeout(type, 500);
            }
        }

        // start the first "typing"
        type();
    </script>
@endpush
