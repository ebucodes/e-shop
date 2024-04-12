@section('title',$pageTitle)
@extends('layouts.website.app')

@section('content')
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>{{ $pageTitle }}</h2>
                        <span> <a href="{{ route('homePage') }}">Home</a> / {{ $pageTitle }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Checkout section -->
<section class="cr-checkout-section padding-tb-100">
    <div class="container">
        <div class="row">
            <!-- Sidebar Area Start -->
            <div class="cr-checkout-rightside col-lg-4 col-md-12">
                <div class="cr-sidebar-wrap">
                    <!-- Sidebar Summary Block -->
                    <div class="cr-sidebar-block">
                        <div class="cr-sb-title">
                            <h3 class="cr-sidebar-title">Summary</h3>
                        </div>
                        <div class="cr-sb-block-content">
                            {{-- @php
                            $subTotal = 0;
                            @endphp --}}
                            @foreach ($collection as $item)
                            <div class="cr-checkout-pro mb-3">
                                <div class="col-sm-12 mb-6">
                                    <div class="cr-product-inner">
                                        <div class="cr-pro-image-outer">
                                            <div class="cr-pro-image">
                                                <a href="product-left-sidebar.html" class="image">
                                                    <img class="main-image"
                                                        src="{{ asset('products/'.$item->product->main_picture) }}"
                                                        alt="Product">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="cr-pro-content cr-product-details">
                                            <h5 class="cr-pro-title"><a href="#">{{
                                                    $item->product->name }}</a></h5>
                                            <p class="cr-price">Quantity: <span class="new-price">{{ $item->quantity
                                                    }}</span></p>
                                            <p class="cr-price">Item Price: <span class="new-price">${{
                                                    number_format($item->product->price,2) }}</span> </p>
                                            <p class="cr-price">Total Price: <span class="new-price">${{
                                                    number_format(($item->product->price * $item->quantity),2)
                                                    }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            @php
                            $subTotal = 0;
                            $delivery = 50;
                            @endphp

                            @foreach ($collection as $item)
                            @php
                            $subTotal += $item->product->price * $item->quantity;
                            $delivery = 50;
                            @endphp
                            @endforeach
                            {{--
                            <div class="cr-checkout-summary">
                                @php
                                $subTotal += $item->product->price * $item->quantity;
                                @endphp
                                <div>
                                    <span class="text-left">Sub-Total</span>
                                    <span class="text-right">${{ $subTotal }}</span>
                                </div>
                                <div>
                                    <span class="text-left">Delivery Charges</span>
                                    <span class="text-right">$80.00</span>
                                </div>
                                <div class="cr-checkout-summary-total">
                                    <span class="text-left">Total Amount</span>
                                    <span class="text-right">$80.00</span>
                                </div>
                            </div> --}}
                            <div class="cr-checkout-summary">
                                <div>
                                    <span class="text-left">Sub-Total</span>
                                    <span class="text-right">${{ number_format($subTotal, 2) }}</span>
                                </div>
                                <div>
                                    <span class="text-left">Delivery Charges</span>
                                    <span class="text-right">${{ number_format($delivery,2) }}</span>
                                </div>
                                <div class="cr-checkout-summary-total">
                                    <span class="text-left">Total Amount</span>
                                    <span class="text-right">${{ number_format($subTotal + $delivery, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Summary Block -->
                </div>
                {{-- <div class="cr-sidebar-wrap cr-checkout-del-wrap">
                    <!-- Sidebar Summary Block -->
                    <div class="cr-sidebar-block">
                        <div class="cr-sb-title">
                            <h3 class="cr-sidebar-title">Delivery Method</h3>
                        </div>
                        <div class="cr-sb-block-content">
                            <div class="cr-checkout-del">
                                <div class="cr-del-desc">Please select the preferred shipping method to use on this
                                    order.</div>
                                <form action="#">
                                    <span class="cr-del-option">
                                        <span>
                                            <span class="cr-del-opt-head">Free Shipping</span>
                                            <input type="radio" id="del1" name="radio-group" checked>
                                            <label for="del1">Rate - $0 .00</label>
                                        </span>
                                        <span>
                                            <span class="cr-del-opt-head">Flat Rate</span>
                                            <input type="radio" id="del2" name="radio-group">
                                            <label for="del2">Rate - $5.00</label>
                                        </span>
                                    </span>
                                    <span class="cr-del-commemt">
                                        <span class="cr-del-opt-head">Add Comments About Your Order</span>
                                        <textarea name="your-commemt" placeholder="Comments"></textarea>
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Summary Block -->
                </div> --}}

                <div class="cr-sidebar-wrap cr-check-pay-img-wrap">
                    <!-- Sidebar Payment Block -->
                    <div class="cr-sidebar-block">
                        <div class="cr-sb-title">
                            <h3 class="cr-sidebar-title">Payment Method</h3>
                        </div>
                        <div class="cr-sb-block-content">
                            <div class="cr-check-pay-img-inner">
                                <div class="cr-check-pay-img">
                                    <img src="{{ asset('website/assets/img/banner/payment.png') }}" alt="payment">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Payment Block -->
                </div>
            </div>
            <div class="cr-checkout-leftside col-lg-8 col-md-12 m-t-991">
                <!-- checkout content Start -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Billing Details</h4>
                    </div>
                    <form action="{{ route('storeOrder') }}" method="post" class="needs-validation" novalidate>
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control"
                                        value="{{ $details->address ?? old('address') }}" placeholder="Address Line"
                                        required>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label>City</label>
                                    <input type="text" name="city" class="form-control"
                                        value="{{ $details->city ?? old('city') }}" placeholder="Enter your city..."
                                        required>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label>Postal Code</label>
                                    <input type="text" name="postal" class="form-control"
                                        placeholder="Enter Postal Code..."
                                        value="{{ $details->postal ?? old('postal') }}" required>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label>Region / State</label>
                                    <input type="text" name="state" class="form-control"
                                        value="{{ $details->state ?? old('state') }}" placeholder="Enter State..."
                                        required>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label>Country</label>
                                    <input type="text" name="country" value="{{ $details->country ?? old('country') }}"
                                        class="form-control" placeholder="Enter Country..." required>
                                </div>
                                <hr>
                                <h6 class="text-center">Contact Details</h6>
                                <div class="col-lg-6 mb-3">
                                    <label>Email Address</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ auth()->user()->email }}" readonly>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label>Phone Number</label>
                                    <input type="tel" name="phone" class="form-control"
                                        value="{{ auth()->user()->phone }}" readonly>
                                </div>
                                <hr>
                                <h6 class="text-center">Payment Method</h6>
                                <p class="text-center">Please select the preferred payment method
                                    to use on this
                                    order</p>
                                <div class="col-lg-12 mb-3">
                                    <span class="cr-pay-option">
                                        <span>
                                            <input type="radio" class="form-control" id="cash" name="payment"
                                                value="cash" checked>
                                            <label for="cash">Cash On Delivery</label>
                                        </span>
                                    </span>
                                    <span class="cr-pay-option">
                                        <span>
                                            <input type="radio" class="form-control" id="card" name="payment"
                                                value="card">
                                            <label for="card">Card on Delivery</label>
                                        </span>
                                    </span>
                                    <span class="cr-pay-option">
                                        <span>
                                            <input type="radio" class="form-control" id="transfer" name="payment"
                                                value="transfer">
                                            <label for="transfer">Bank Transfer</label>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Place Order</button>
                        </div>
                    </form>
                </div>
                <!--cart content End -->
            </div>
        </div>
    </div>
</section>
<!-- Checkout section End -->
@endsection
