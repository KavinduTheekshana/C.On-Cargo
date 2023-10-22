<div class="appiontment-area appiontment-padding pt-200 pb-130"
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
                    <form class="appiontment-form" action="#" data-animscroll="fade-up" data-animscroll-delay="500">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 mb-20">
                                <div class="pro-filter">
                                    <select name="pro-filter">
                                        <option value="1">Sri Lanka To UK</option>
                                        <option value="2">UK to Sri Lanka</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="pro-filter">
                                    <select name="pro-filter">
                                        <option value="1">Wherehouse To Door</option>
                                        <option value="2">Door To Door</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mb-20">
                                <div>
                                    <input type="text" name="name" placeholder="Number Of Kilogram">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 mb-20">
                                <div class="mb-20">
                                    <input type="text" name="height" placeholder="Height">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-20">
                                <div class="mb-20">
                                    <input type="text" name="weight" placeholder="Weight">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-20">
                                <div class="mb-20">
                                    <input type="text" name="length" placeholder="Length">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="app-button">
                                    <button class="btn" type="submit">send request <i
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
    
</script>
@endpush