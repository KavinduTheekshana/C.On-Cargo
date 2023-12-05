<div class="skills-area pos-rel pt-130 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 pl-28" data-animscroll="fade-right"
                data-animscroll-delay="100">
                <div class="skills-02-wrapper mb-30">
                    <form id="tracking-form" class="appiontment-form" action="{{ route('regularuser') }}" method="POST">
                        @csrf
                        <div class="text-center center-align-content">
                            <h1 class="text-center">Tracking</h1>
                            <p class="login-intro mb-30">Please enter your invoice number to receive tracking updates.
                            </p>

                            @if (session('status'))
                                <div class="mb-4">
                                    <div class="col">
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    </div>

                                </div>
                            @endif


                            <div class="col-lg-12 col-md-12">
                                <div class="mb-20">
                                    <input type="text" id="invoice_number" name="invoice_number" value="DW-00001"
                                        placeholder="Invoice Number">
                                    @error('invoice_number')
                                        <p class="text-danger text-left">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 mt-20-btn">
                                <div class="mb-20">
                                    <button class="btn red-btn squre-btn" type="submit">Track Your Order <i
                                            class="far fa-paper-plane"></i></button>
                                </div>
                            </div>
                    </form>

                    <div id="tracking" class="col-lg-12 col-md-12 mt-40 d-none">
                        <div class="mb-20">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-12 hh-grayBox pt45 pb20">
                                        <div class="row justify-content-between">
                                            <div id="dispatched" class="order-tracking">
                                                <span class="is-complete"></span>
                                                <p>DISPATCHED<br><span id="dispatched_date"></span></p>
                                            </div>
                                            <div id="transit" class="order-tracking">
                                                <span class="is-complete"></span>
                                                <p>IN TRANSIT<br></p>
                                            </div>
                                            <div id="out" class="order-tracking">
                                                <span class="is-complete"></span>
                                                <p>OUT FOR DELIVERY<br></p>
                                            </div>
                                            <div id="estimate" class="order-tracking">
                                                <span class="is-complete"></span>
                                                <p>ESTIMETED DELIVERY<br><span id="estimate_date"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        // submit form
        $(document).ready(function() {
            $('#tracking-form').submit(function(event) {
                event.preventDefault(); // Prevent the default form submission

                var formData = {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    invoice_number: $('#invoice_number').val(),
                };
                $.ajax({
                    type: 'POST',
                    url: '{{ route('tracking.invoice') }}',
                    data: formData,
                    success: function(result) {
                        console.log(result);
                        // Check if the response contains invoice_id
                        if (result.tracking_id) {
                            // Show the tracking section
                            $('#dispatched_date').text(new Date(result.departed_at).toLocaleDateString('en-US'));
                            $('#estimate_date').text(new Date(result.arrived_at).toLocaleDateString('en-US'));
                            // $('#dispatched_date').text(result.departed_at);
                            // $('#estimate_date').text(result.arrived_at);
                            if (result.stop_id == 1) {
                                $('#dispatched').addClass('completed');
                            }
                            if (result.stop_id == 2) {
                                $('#dispatched').addClass('completed');
                                $('#transit').addClass('completed');
                            }
                            if (result.stop_id == 3) {
                                $('#dispatched').addClass('completed');
                                $('#transit').addClass('completed');
                                $('#out').addClass('completed');
                            }
                            if (result.stop_id == 4) {
                                $('#dispatched').addClass('completed');
                                $('#transit').addClass('completed');
                                $('#out').addClass('completed');
                                $('#estimate').addClass('completed');
                            }
                            $('#tracking').removeClass('d-none');
                        } else {
                            // Handle the case where invoice_id is not present
                            alert("Invoice ID not found", );
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("Error", error, "error");
                    }
                });
            });
        });
    </script>
@endpush
