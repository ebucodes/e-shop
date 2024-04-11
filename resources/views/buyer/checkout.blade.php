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
                                            <h5 class="cr-pro-title"><a href="product-left-sidebar.html">{{
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
                            @endphp

                            @foreach ($collection as $item)
                            @php
                            $subTotal += $item->product->price * $item->quantity;
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
                                    <span class="text-right">$80.00</span>
                                </div>
                                <div class="cr-checkout-summary-total">
                                    <span class="text-left">Total Amount</span>
                                    <span class="text-right">${{ number_format($subTotal + 80, 2) }}</span>
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
                <div class="cr-checkout-content">
                    <div class="cr-checkout-inner">
                        <div class="cr-checkout-wrap">
                            <div class="cr-checkout-block cr-check-bill">
                                <h3 class="cr-checkout-title">Billing Details</h3>
                                <div class="cr-bl-block-content">
                                    <div class="cr-check-bill-form mb-minus-24">
                                        <form action="#" method="post">
                                            <span class="cr-bill-wrap">
                                                <label>Address</label>
                                                <input type="text" name="address" placeholder="Address Line 1">
                                            </span>
                                            <span class="cr-bill-wrap cr-bill-half">
                                                <label>City *</label>
                                                <span class="cr-bl-select-inner">
                                                    <select name="cr_select_city" id="cr-select-city"
                                                        class="cr-bill-select">
                                                        <option selected disabled>City</option>
                                                        <option value="1">City 1</option>
                                                        <option value="2">City 2</option>
                                                        <option value="3">City 3</option>
                                                        <option value="4">City 4</option>
                                                        <option value="5">City 5</option>
                                                    </select>
                                                </span>
                                            </span>
                                            <span class="cr-bill-wrap cr-bill-half">
                                                <label>Post Code</label>
                                                <input type="text" name="postalcode" placeholder="Post Code">
                                            </span>
                                            <span class="cr-bill-wrap cr-bill-half">
                                                <label>Country *</label>
                                                <span class="cr-bl-select-inner">
                                                    <select name="cr_select_country" id="cr-select-country"
                                                        class="cr-bill-select">
                                                        <option selected disabled>Country</option>
                                                        <option value="1">Country 1</option>
                                                        <option value="2">Country 2</option>
                                                        <option value="3">Country 3</option>
                                                        <option value="4">Country 4</option>
                                                        <option value="5">Country 5</option>
                                                    </select>
                                                </span>
                                            </span>
                                            <span class="cr-bill-wrap cr-bill-half">
                                                <label>Region State</label>
                                                <span class="cr-bl-select-inner">
                                                    <select name="cr_select_state" id="cr-select-state"
                                                        class="cr-bill-select">
                                                        <option selected disabled>Region/State</option>
                                                        <option value="1">Region/State 1</option>
                                                        <option value="2">Region/State 2</option>
                                                        <option value="3">Region/State 3</option>
                                                        <option value="4">Region/State 4</option>
                                                        <option value="5">Region/State 5</option>
                                                    </select>
                                                </span>
                                            </span>
                                            <hr>
                                            {{-- <div class="cr-sb-title">
                                                <h4 class="cr-sidebar-title">Payment Method</h4>
                                            </div> --}}
                                            <div class="cr-sb-block-content">
                                                <div class="cr-checkout-pay">
                                                    <div class="cr-pay-desc">Please select the preferred payment method
                                                        to use on this
                                                        order.</div>
                                                    <span class="cr-pay-option">
                                                        <span>
                                                            <input type="radio" class="form-control" id="cash"
                                                                name="radio-group" checked>
                                                            <label for="cash">Cash On Delivery</label>
                                                        </span>
                                                    </span>
                                                    <span class="cr-pay-option">
                                                        <span>
                                                            <input type="radio" class="form-control" id="card"
                                                                name="radio-group">
                                                            <label for="card">Card on Delivery</label>
                                                        </span>
                                                    </span>
                                                    <span class="cr-pay-option">
                                                        <span>
                                                            <input type="radio" class="form-control" id="transfer"
                                                                name="radio-group">
                                                            <label for="transfer">Bank Transfer</label>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <span class="cr-check-order-btn">
                            <a class="cr-button mt-30" href="#">Place Order</a>
                        </span>
                    </div>
                </div>
                <!--cart content End -->
            </div>
        </div>
    </div>
</section>
<!-- Checkout section End -->
@endsection