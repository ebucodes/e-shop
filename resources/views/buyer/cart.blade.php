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

<!-- Cart -->
<section class="section-cart padding-t-100">
    <div class="container">
        <div class="row d-none">
            <div class="col-lg-12">
                <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="cr-banner">
                        <h2>Cart</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore lacus vel facilisis. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="cr-cart-content" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="row">
                        <form action="{{ route('updateCart') }}" method="POST">
                            @csrf
                            <div class="cr-table-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th class="text-center">Quantity</th>
                                            {{-- <th>Total</th> --}}
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($collection as $item)
                                        <tr>
                                            <td class="cr-cart-name">
                                                <a href="javascript:void(0)">
                                                    <img src="{{ asset('products/'.$item->product->main_picture) }}"
                                                        alt="product-1" class="cr-cart-img">
                                                    {{ $item->product->name }}
                                                </a>
                                            </td>
                                            <td class="cr-cart-price">
                                                <span class="amount">${{ number_format($item->product->price,2)
                                                    }}</span>
                                            </td>
                                            <td class="cr-cart-qty">
                                                <div class="cart-qty-plus-minus">
                                                    <button type="button" class="plus">+</button>
                                                    <input type="text" placeholder="." name="quantity[]" minlength="1"
                                                        value="{{ $item->quantity }}" class="quantity">
                                                    {{-- <input type="number" class="quantity"
                                                        value="{{ $item->quantity }}" min="1"
                                                        data-product-id="{{ $item->product->id }}">--}}
                                                    <button type="button" class="minus">-</button>
                                                </div>
                                            </td>
                                            {{-- <td class="cr-cart-subtotal total">{{ $item->product->price *
                                                $item->quantity }}</td> --}}
                                            <input type="hidden" name="cart[]" value="{{ $item->id }}">
                                            <td class="cr-cart-remove">
                                                <a href="javascript:void(0)">
                                                    <i class="ri-delete-bin-line"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cr-cart-update-bottom">
                                        <a href="{{ url()->previous() }}" class="cr-links">Continue Shopping</a>
                                        <button type="submit" class="cr-button">
                                            Proceed to Check Out
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@endsection
