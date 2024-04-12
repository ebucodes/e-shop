@section('title',config('app.name') .' | '. $pageTitle)
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
                        <span> <a href="{{ route('homePage') }}">Home</a> - {{ $pageTitle }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Shop -->
<section class="section-shop padding-tb-100">
    <div class="container">
        <div class="row d-none">
            <div class="col-lg-12">
                <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="cr-banner">
                        <h2>Categories</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore lacus vel facilisis. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                <div class="row">
                    <div class="col-12">
                        <div class="cr-shop-bredekamp">
                            <div class="cr-toggle">
                                <a href="javascript:void(0)" class="shop_side_view">
                                    <i class="ri-filter-line"></i>
                                </a>
                                <a href="javascript:void(0)" class="gridCol active-grid">
                                    <i class="ri-grid-line"></i>
                                </a>
                                <a href="javascript:void(0)" class="gridRow">
                                    <i class="ri-list-check-2"></i>
                                </a>
                            </div>
                            <div class="center-content">
                                <span>We found {{ $countProducts }} items for you!</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row col-50 mb-minus-24">
                    @foreach ($products as $product)
                    <div class="col-lg-3 col-6 cr-product-box mb-24">
                        <div class="cr-product-card">
                            <div class="cr-product-image">
                                <div class="cr-image-inner zoom-image-hover">
                                    <img src="{{ asset('products/'. $product->main_picture) }}" width="100" height="100"
                                        alt="product-1">
                                </div>
                                <div class="cr-side-view">
                                    <a href="javascript:void(0)" class="wishlist">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                    <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                        role="button">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </div>
                                <a class="cr-shopping-bag" href="javascript:void(0)">
                                    <i class="ri-shopping-bag-line"></i>
                                </a>
                            </div>
                            <div class="cr-product-details">
                                <div class="cr-brand">
                                    <a href="#">{{ $product->cat->name }}</a>
                                </div>
                                <a href="#" class="title">{{ $product->name }}</a>
                                <p class="text">{{ $product->desc }}</p>
                                <p class="cr-price"><span class="new-price">${{ number_format($product->price,2)
                                        }}</span></p>
                                @if($product->status == 'out_of_stock')
                                <p class="text-danger">This product is out of stock and currently not available</p>
                                @elseif (auth()->check() && auth()->user()->role == 'buyer')
                                <form action="{{ route('addToCart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product" value="{{ $product->id }}">
                                    <input type="hidden" name="user" value="{{ auth()->user()->email }}">
                                    <div class="cr-add-card">
                                        <div class="cr-add-button">
                                            <button type="submit" class="cr-button">Add to cart</button>
                                        </div>
                                    </div>
                                </form>
                                @else
                                <p>Please log in to add items to your cart.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <nav aria-label="..." class="cr-pagination">
                    <ul class="pagination">
                        <li class="page-item">{{ $products->links() }}</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

@endsection
