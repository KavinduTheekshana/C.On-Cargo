@extends('layouts.frontend')

@section('content')
    <main>

        <!-- slider-start -->
        @include('frontend.home.slider')
        <!-- slider-start -->

        <!-- features-area-start -->
        {{-- @include('frontend.home.features') --}}
        <!-- features-area-end -->

        <!-- about-us-area-start -->
        @include('frontend.home.about')
        <!-- about-us-area-end -->

        <!-- cta-area-start -->
        @include('frontend.home.support')
        <!-- cta-area-end -->



        <!-- services-area-start -->
        @include('frontend.home.services')
        <!-- services-area-end -->

        <!-- appiontment-area-start -->
        @include('frontend.home.quote')
        <!-- appiontment-area-end -->

        <!-- testimonial-area-start -->
        @include('frontend.home.testimonial')
        <!-- testimonial-area-end -->

        <!-- features-02-area-start -->
        @include('frontend.home.whatwedo')
        <!-- features-02-area-end -->

        <!-- skills-area-start -->
        {{-- @include('frontend.home.skill') --}}
        <!-- skills-area-end -->


        @include('frontend.home.faq')

            <!-- newsletters-area-start -->
            @include('frontend.home.newsletter')
            <!-- newsletters-area-end -->



        <!-- blog-area-start -->
        {{-- @include('frontend.home.blog') --}}
        <!-- blog-area-end -->

        <!-- brand-area-start -->
        @include('frontend.components.brand')
        <!-- brand-area-end -->
    </main>
@endsection

@push('scripts')
{{-- <script>
    $(document).ready(function(){
      // Add smooth scrolling to all links
      $(".scroll-link").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();

          // Store hash
          var hash = this.hash;

          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){

            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        } // End if
      });
    });
  </script> --}}

@endpush
