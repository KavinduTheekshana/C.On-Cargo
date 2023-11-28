<div id="quoteSection" class="appiontment-area appiontment-padding pt-200 pb-130"
    style="background-image:url({{ asset('frontend/assets/img/bg/bg-06.jpg') }})">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 offset-xl-4 col-lg-7 offset-lg-5">
                <div class="appiontment-wrapper app-wrapper">
                    <div class="section-title pos-rel mb-30" data-animscroll="fade-up" data-animscroll-delay="500">
                        <h1>03</h1>
                        <span class="line">Request A Quote</span>
                        <h2>Booking For Product Transformation</h2>
                    </div>
                    <form class="appiontment-form" id="quote-form" onsubmit="handleFormSubmission(event);"
                        style="border: 4px solid #fff; padding: 30px" data-animscroll="fade-up"
                        data-animscroll-delay="500">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 mb-20">
                                <label>&nbsp;Select Destination</label>
                                <div class="pro-filter">
                                    <select id="destination">
                                        <option value="poH6ALuy">Sri Lanka To UK</option>
                                        <option value="aUMkQFy1">UK to Sri Lanka</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <label>&nbsp;Select Delivary Method</label>
                                <div class="pro-filter">
                                    <select id="delivary_type">
                                        <option selected>Choose...</option>
                                        <option value="77N9WRz7">Wherehouse To Door</option>
                                        <option value="iwZgp3vP">Door To Door</option>
                                        <option disabled value="IdEGUSEx">Wherehouse To Wherehouse</option>
                                        <option disabled value="rEDFIeNT">Door To Door (W/Province)</option>
                                        <option disabled value="EBUSilYW">Door To Door (Out Of W/Province)</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div id="item_type_div" class="row d-none">
                            <div class="col-lg-12 col-md-12 mb-20">
                                <div class="pro-filter">
                                    <select id="item_type" disabled>
                                        <option value="NPlEADea">Personal</option>
                                        <option value="hujJdAKz">Commercial</option>
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

document.addEventListener('DOMContentLoaded', function() {
    var destinationSelect = document.getElementById('destination');
    var deliveryTypeSelect = document.getElementById('delivary_type');
    var itemTypeDiv = document.getElementById('item_type_div');
    var itemTypeSelect = document.getElementById('item_type');

    destinationSelect.addEventListener('change', function() {
        var selectedValue = this.value;
// Reset to the default option "Choose..."
deliveryTypeSelect.selectedIndex = 0;
        // Check if the selected value is 'UK to Sri Lanka'
        if (selectedValue === 'aUMkQFy1') {
            // Toggle the disabled state of each option in delivery_type except the first one
            for (var i = 1; i < deliveryTypeSelect.options.length; i++) {
                var option = deliveryTypeSelect.options[i];
                option.disabled = !option.disabled;
            }

            // Show item_type_div and enable item_type select
            itemTypeDiv.classList.remove('d-none');
            itemTypeSelect.disabled = false;
        } else {
            // Reset delivery_type to its original state except the first one
            for (var i = 1; i < deliveryTypeSelect.options.length; i++) {
                var option = deliveryTypeSelect.options[i];
                option.disabled = option.value === 'IdEGUSEx' ||
                                  option.value === 'rEDFIeNT' ||
                                  option.value === 'EBUSilYW';
            }

            // Hide item_type_div and disable item_type select
            itemTypeDiv.classList.add('d-none');
            itemTypeSelect.disabled = true;
        }
    });
});





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
                    alertFunction("Error", "Wrong Delivary Type", "warning");
                }

                //Uk TO Sri Lanka
            } else if (destination == "aUMkQFy1") {
                alert('Email submitted');
            } else {
                alert('Email submitted');
            };
        }

        // function handleFormSubmission(event) {
        //     // Prevent the default form submission
        //     event.preventDefault();

        //     // Retrieve form input values
        //     var destination = document.getElementById('destination').value;
        //     var deliveryType = document.getElementById('delivary_type').value;
        //     var kg = parseFloat(document.getElementById('kg').value);
        //     var dimensions = {
        //         height: parseFloat(document.getElementById('height').value),
        //         width: parseFloat(document.getElementById('width').value),
        //         length: parseFloat(document.getElementById('length').value),
        //     };

        //     // Constants
        //     const DELIVERY_FEE = 10;
        //     const MAX_KG = 31;
        //     const RATE_PER_KG = 4;
        //     const DIMENSION_DIVISOR = 5000;

        //     // Calculate chargeable weight and dimension
        //     var chargeableWeight = kg * RATE_PER_KG;
        //     var chargeableDimension = (dimensions.height * dimensions.width * dimensions.length) / DIMENSION_DIVISOR *
        //         RATE_PER_KG;
        //     var collectionFee = calculateCollectionFee(deliveryType, kg);

        //     // Check if the input is valid and calculate total
        //     if (kg >= MAX_KG) {
        //         alertFunction("Wrong Input", "You can deliver less than 30 kilograms. Please enter the correct value",
        //             "warning");
        //         return;
        //     }

        //     if (destination === "poH6ALuy") {
        //         var total = calculateTotal(chargeableWeight, chargeableDimension, DELIVERY_FEE, collectionFee);
        //         alertFunction("Your Estimate is Ready", "Your Estimate Charge is: £" + total.toFixed(2), "success");
        //     } else {
        //         // Handle other destinations
        //         alert('Email submitted');
        //     }
        // }

        // function calculateTotal(weight, dimension, deliveryFee, collectionFee) {
        //     return Math.max(weight, dimension) + deliveryFee + collectionFee;
        // }

        // function calculateCollectionFee(deliveryType, kg) {
        //     if (deliveryType === "77N9WRz7") {
        //         return 0;
        //     } else if (deliveryType === "iwZgp3vP") {
        //         return kg < 13 ? 5 : 10;
        //     } else {
        //         alert('Wrong Delivery Type');
        //         return 0;
        //     }
        // }

        // function alertFunction(title, message, type) {
        //     // Implementation of alertFunction
        // }




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
