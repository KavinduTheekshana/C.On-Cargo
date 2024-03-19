@extends('layouts.frontend')

@section('content')
    <main>
        <!-- breadcrumb-area-start -->
    @section('page_img', asset('frontend/assets/img/bg/icons8-team-yTwXpLO5HAA-unsplash2.jpg'))
    @section('page_name', 'Update')
    @include('frontend.components.authbreadcrumb')
    <!-- breadcrumb-area-end -->

    <div class="skills-area pos-rel pt-130 pb-100">
        <div class="container">
            <div class="row">


                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session('success') }}
                        </div>
                    @endif


                        <div id="booking" class="container">
                            <h2>Update Booking</h2>
                            <p>Booking ID : #{{$booking->id}}</p>

                            <hr>
                            <form class="appiontment-form mt-5" action="{{ route('user.booking.update') }}" method="POST">
                                @csrf
                                <input type="text" value="{{$booking->id}}" name="id" hidden readonly>
                                <div class="form-group">
                                    <label for="inputState">From Address <span class="theme-color">*</span></label>
                                    {{-- <div class="pro-filter"> --}}
                                    <select id="destination" name="sender">
                                        <option value="{{$booking->sender_id}}" selected>{{ $sender->firstname }} {{ $sender->lastname }} |
                                            {{ $sender->address }}, {{ $sender->postcode }},
                                            {{ $sender->country }}</option>
                                        @foreach ($address as $item)
                                            <option value="{{ $item->id }}">{{ $item->firstname }}
                                                {{ $item->lastname }} |
                                                {{ $item->address }}, {{ $item->postcode }},
                                                {{ $item->country }}
                                            </option>
                                        @endforeach

                                    </select>
                                    @error('sender')
                                        <p class="text-danger text-left">{{ $message }}</p>
                                    @enderror
                                    {{-- </div> --}}
                                </div>

                                <div class="form-group">
                                    <label for="inputState">To Address <span class="theme-color">*</span></label>
                                    {{-- <div class="pro-filter"> --}}
                                    <select id="destination" name="receiver">
                                        <option value="{{$booking->receiver_id}}" selected>{{ $reciver->firstname }} {{ $reciver->lastname }} |
                                            {{ $reciver->address }}, {{ $reciver->postcode }},
                                            {{ $reciver->country }}</option>
                                        @foreach ($address as $item)
                                            <option value="{{ $item->id }}">{{ $item->firstname }}
                                                {{ $item->lastname }} |
                                                {{ $item->address }}, {{ $item->postcode }}, {{ $item->country }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('receiver')
                                        <p class="text-danger text-left">{{ $message }}</p>
                                    @enderror
                                    {{-- </div> --}}
                                </div>

                                <label>&nbsp;Please Enter Dimensions <span
                                        class="theme-color">(<b>CM</b>)*</span></label>
                                <div class="row">

                                    <div class="col-lg-4 col-md-6">
                                        <div class="mb-20">
                                            <input type="number" id="height" name="height" value="{{$booking->height}}" placeholder="Height"
                                                required>
                                            @error('height')
                                                <p class="text-danger text-left">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="mb-20">
                                            <input type="number" id="width" name="width" value="{{$booking->width}}" placeholder="Width"
                                                required>
                                            @error('width')
                                                <p class="text-danger text-left">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="mb-20">
                                            <input type="number" id="length" name="length" value="{{$booking->length}}" placeholder="Length"
                                                required>
                                            @error('length')
                                                <p class="text-danger text-left">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <label for="inputCity">Number Of Kilogram (KG) <span
                                            class="theme-color">*</span></label>
                                    <input type="number" class="form-control" required value="{{$booking->weight}}" name="weight">
                                    @error('weight')
                                        <p class="text-danger text-left">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputCity">Contact Number <span class="theme-color">*</span></label>
                                    <input type="text" class="form-control" value="{{$booking->contact}}" required name="contact">
                                    @error('contact')
                                        <p class="text-danger text-left">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputCity">Item List <span class="theme-color">*</span></label>
                                    <textarea class="form-control" name="item_list" required rows="5">{{$booking->item_list}}</textarea>
                                    @error('item_list')
                                        <p class="text-danger text-left">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputCity">Remarks</label>
                                    <textarea class="form-control" name="remarks" rows="3">{{$booking->remarks}}</textarea>
                                    @error('remarks')
                                        <p class="text-danger text-left">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary squre-btn">Update</button>
                            </form>
                        </div>





            </div>
        </div>

    </div>

</main>
@endsection


