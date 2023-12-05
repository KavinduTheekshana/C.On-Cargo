<div class="contact-us-area pt-125 pb-115 mb-130" style="background-image:url({{ asset('frontend/assets/img/bg/09.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 offset-lg-2 offset-xl-2">
                <div class="section-title white-title section-2 text-center pos-rel mr-80 ml-80 mb-75" data-animscroll="fade-up" data-animscroll-delay="500">
                    <h1>07</h1>
                    <span class="border-left-1"></span>
                    <span>Contact Us</span>
                    <span class="border-right-1"></span>
                    <h2>Don't Hesitated To Contact Us</h2>
                </div>
            </div>
        </div>
        <div class="row" data-animscroll="fade-up" data-animscroll-delay="500">
            <div class="col-xl-4 col-lg-4">
                <div class="single-contact-us mb-30">
                    <div class="contact-us-list">
                        <div class="contact-us-icon f-right">
                            <i class="far fa-phone"></i>
                        </div>
                        <div class="contact-us-text f-right">
                            <span>Phone Number</span>
                            <h4>+44 75 032 88 488</h4>
                        </div>
                    </div>
                    <div class="contact-us-list">
                        <div class="contact-us-icon f-right">
                            <i class="far fa-envelope-open"></i>
                        </div>
                        <div class="contact-us-text f-right">
                            <span>Email Address</span>
                            <h4>info@concargo.co.uk</h4>
                        </div>
                    </div>
                    <div class="contact-us-list">
                        <div class="contact-us-icon f-right">
                            <i class="far fa-phone"></i>
                        </div>
                        <div class="contact-us-text f-right">
                            <span>Main Office</span>
                            <h4>12 King Arthur Ct, <br>Waltham Cross<br> EN8 8EH</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8">
                <div class="contact-us-wrapper">
                    <form id="contact-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-2-box user-2-icon mb-30">
                                    <input type="text" id="name" name="name" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-2-box email-2-icon mb-30">
                                    <input type="text" id="email" name="email" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-2-box phone-2-icon mb-30">
                                    <input type="text" id="phone" name="phone" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-2-box subject-2-icon mb-30">
                                    <input type="text" id="subject" name="subject" placeholder="Your Subject">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-2-box message-2-icon mb-30">
                                    <textarea name="message" id="message" cols="30" rows="10" placeholder="send message"></textarea>
                                </div>
                                <div class="contact-btn">
                                    <button class="btn btn-icon" type="submit">send request <i class="far fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
     // submit form
     $(document).ready(function() {
            $('#contact-form').submit(function(event) {
                event.preventDefault(); // Prevent the default form submission

                var formData = {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    name: $('#name').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    subject: $('#subject').val(),
                    message: $('#message').val(),
                };

                $.ajax({
                    type: 'POST',
                    url: '{{ route('contactsubmit') }}',
                    data: formData,
                    success: function(result) {
                        console.log(result);
                        alertFunctionContactForm("Success",result.message, "success");
                        $('#contact-form')[0].reset();
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                        alertFunctionContactForm("Error",error, "error");
                    }
                });
            });
        });

        function alertFunctionContactForm(title, message, icon) {
            Swal.fire({
                title: title,
                text: message,
                icon: icon,
            })
        }
</script>
@endpush