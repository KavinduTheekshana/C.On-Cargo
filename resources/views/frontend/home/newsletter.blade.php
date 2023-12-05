<div class="newsletters-area pt-90 pb-75 pos-rel" style="background-image:url({{ asset('frontend/assets/img/bg/08.jpg')}})">
    <div class="newsletters-shape-img" data-animscroll="fade-right" data-animscroll-delay="500">
        <img src="{{ asset('frontend/assets/img/bg/011.png')}}" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-4  col-lg-6 offset-lg-6" data-animscroll="fade-left" data-animscroll-delay="500">
                <div class="single-02-newsletters mb-30">
                    <div class="section-title pos-rel mb-40">
                        <span class="line">Our Newsletters</span>
                        <h2>Don’t Miss Our Offer Tips & Much More</h2>
                    </div>
                    <div class="newsletter-form">
                        <form id="newsletter">
                            @csrf
                            <div class="news-box">
                                <input placeholder="Enter Your Email :" id="newslatteremail" name="email" type="email">
                                <button type="submit"><i class="far fa-paper-plane"></i></button>
                            </div>
                        </form>
                        <label id="success_newsletter" class="text-success" for="Subscription successful"></label>
                        <label id="error_newsletter" class="text-danger" for="Subscription successful"></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
     // submit form
     $(document).ready(function() {
            $('#newsletter').submit(function(event) {
                event.preventDefault(); // Prevent the default form submission

                var formData = {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    email: $('#newslatteremail').val(),
                };

                $.ajax({
                    type: 'POST',
                    url: '{{ route('newsletter') }}',
                    data: formData,
                    success: function(result) {
                        console.log(result);
                        alertFunctionNewsletter("Success",result.message, "success");
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                        alertFunctionNewsletter("Error",error, "error");
                    }
                });
            });
        });

        function alertFunctionNewsletter(title, message, icon) {
            Swal.fire({
                title: title,
                text: message,
                icon: icon,
                showCancelButton: true,
                cancelButtonColor: "#d33",
            })
        }
</script>
@endpush