<div id="quoteSection" class="appiontment-area appiontment-padding pt-200 pb-130"
    style="background-image:url({{ asset('frontend/assets/img/bg/bg-06.jpg') }})">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 offset-xl-4 col-lg-7 offset-lg-5">
                <div class="appiontment-wrapper app-wrapper">
                    <div class="section-title pos-rel mb-70" data-animscroll="fade-up" data-animscroll-delay="500">
                        <h1>03</h1>
                        <span class="line">Request A Quote</span>
                        <h2>Booking For Product Transformation</h2>
                    </div>
                    <form class="appiontment-form" id="quote-form" onsubmit="handleFormSubmission(event);"
                        data-animscroll="fade-up" data-animscroll-delay="500">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 mb-20">
                                <div class="pro-filter">
                                    <select id="destination">
                                        <option value="poH6ALuy">Sri Lanka To UK</option>
                                        <option value="aUMkQFy1">UK to Sri Lanka</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="pro-filter">
                                    <select id="delivary_type">
                                        <option value="77N9WRz7">Wherehouse To Door</option>
                                        <option value="iwZgp3vP">Door To Door</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mb-20">
                                <div>
                                    <input type="number" inputmode="numeric" id="kg" name="kg"
                                        placeholder="Number Of Kilogram" required>
                                </div>
                            </div>
                        </div>
                        <label>&nbsp;Please Enter the Centimeter Value <span
                                class="theme-color">(<b>CM</b>)</span></label>
                        <div class="row">

                            <div class="col-lg-4 col-md-6 mb-20">
                                <div class="mb-20">
                                    <input type="number" id="height" name="height" placeholder="Height" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-20">
                                <div class="mb-20">
                                    <input type="number" id="width" name="width" placeholder="Width" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-20">
                                <div class="mb-20">
                                    <input type="number" id="length" name="length" placeholder="Length" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="app-button">
                                    <button class="btn" type="submit">View Quotation <i
                                            class="far fa-paper-plane"></i></button>
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
        // Function to handle the form submission
        function handleFormSubmission(event) {
            // Prevent the default form submission
            event.preventDefault();
            var destinationInput = document.getElementById('destination');
            var delivary_typeInput = document.getElementById('delivary_type');
            var kgInput = document.getElementById('kg');
            var heightInput = document.getElementById('height');
            var widthInput = document.getElementById('width');
            var lengthInput = document.getElementById('length');

            var destination = destinationInput.value;
            var delivary_type = delivary_typeInput.value;
            var kg = kgInput.value;
            var height = heightInput.value;
            var width = widthInput.value;
            var length = lengthInput.value;

            var total = 0;
            var delivary_fee = 0;
            var collection_fee = 0;
            var chargeable_weight = 0;
            var chargeable_diamention = 0;
            //srilanka to uk
            if (destination == "poH6ALuy") {
                delivary_fee = 10;
                //wherehouse to door
                if (delivary_type == "77N9WRz7") {
                    if (kg >= 30) {
                        alertFunction("Wrong Input",
                            "You can Deliver Less than 30 Kilograms. Please enter the correct value", "warning");
                    } else {
                        collection_fee = 0;
                        chargeable_weight = kg * 4;
                        chargeable_diamention = ((height * width * length) / 5000) * 4;
                        if (chargeable_weight > chargeable_diamention) {
                            total = chargeable_weight + delivary_fee + collection_fee;
                        } else {
                            total = chargeable_diamention + delivary_fee + collection_fee;
                        }
                        alertFunction("Your Estimate is Ready", "Your Estimate Charge is: £" + total.toFixed(2), "success");

                    }

                    //door to door
                } else if (delivary_type == "iwZgp3vP") {
                    if (kg < 13) {
                        collection_fee = 5;
                        chargeable_weight = kg * 4;
                        chargeable_diamention = ((height * width * length) / 5000) * 4;

                        if (chargeable_weight > chargeable_diamention) {
                            total = chargeable_weight + delivary_fee + collection_fee;
                        } else {
                            total = chargeable_diamention + delivary_fee + collection_fee;
                        }
                        alertFunction("Your Estimate is Ready", "Your Estimate Charge is: £" + total.toFixed(2), "success");
                    } else if (kg < 31) {
                        collection_fee = 10;
                        chargeable_weight = kg * 4;
                        chargeable_diamention = ((height * width * length) / 5000) * 4;

                        if (chargeable_weight > chargeable_diamention) {
                            total = chargeable_weight + delivary_fee + collection_fee;
                        } else {
                            total = chargeable_diamention + delivary_fee + collection_fee;
                        }
                        alertFunction("Your Estimate is Ready", "Your Estimate Charge is: £" + total.toFixed(2), "success");
                        // alert("Your Estimate Charge is: £" + total.toFixed(2));
                    } else {
                        alertFunction("Wrong Input",
                            "You can Deliver Less than 30 Kilograms. Please enter the correct value", "warning");
                    }
                } else {
                    alert('Wrong Delivary Type');
                }

                //Uk TO Sri Lanka
            } else if (destination == "aUMkQFy1") {
                alert('Email submitted');
            } else {
                alert('Email submitted');
            };
        }

        function alertFunction(title, message, icon) {
            Swal.fire({
                title: title,
                text: message,
                icon: icon,
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Place an Order"
            }).then(result => {
                if (result.isConfirmed) {
                    window.location.href = "/user/login";
                }
            });
        }
    </script>
@endpush
