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
                        <h2>{{ $pageTitle }}</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore lacus vel facilisis. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-12 md-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                <div class="cr-shop-sideview">
                    <div class="cr-shop-categories">
                        <h4 class="cr-shop-sub-title">Category</h4>
                        <div class="cr-checkbox">
                            <div class="checkbox-group">
                                <input type="checkbox" id="drinks">
                                <label for="drinks">Juice & Drinks</label>
                                <span>[20]</span>
                            </div>
                            <div class="checkbox-group">
                                <input type="checkbox" id="drinks1">
                                <label for="drinks1">Dairy & Milk</label>
                                <span>[54]</span>
                            </div>
                            <div class="checkbox-group">
                                <input type="checkbox" id="drinks2">
                                <label for="drinks2">Snack & Spice</label>
                                <span>[64]</span>
                            </div>
                        </div>
                    </div>
                    <div class="cr-shop-price">
                        <h4 class="cr-shop-sub-title">Price</h4>
                        <div class="price-range-slider">
                            <div id="slider-range" class="range-bar"></div>
                            <p class="range-value">
                                <label>Price :</label>
                                <input type="text" id="amount" placeholder="'" readonly>
                            </p>
                            <button type="button" class="cr-button">Filter</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-12 md-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                <div class="row">
                    <div class="col-12">
                        <div class="cr-shop-bredekamp">
                            <div class="cr-toggle">
                                <a href="javascript:void(0)" class="gridCol active-grid">
                                    <i class="ri-grid-line"></i>
                                </a>
                                <a href="javascript:void(0)" class="gridRow">
                                    <i class="ri-list-check-2"></i>
                                </a>
                            </div>
                            <div class="center-content">
                                <span>We found <strong>{{ $countProducts }}</strong> items for you!</span>
                            </div>
                            {{-- <div class="cr-select">
                                <label>Sort By :</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Featured</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <option value="4">Four</option>
                                    <option value="5">Five</option>
                                </select>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="row col-100 mb-minus-24">
                    @foreach ($products as $product)
                    <div class="col-xxl-4 col-xl-4 col-6 cr-product-box mb-24">
                        <div class="cr-product-card">
                            <div class="cr-product-image">
                                <div class="cr-image-inner zoom-image-hover">
                                    <img src="{{ asset('products/'.$product->main_picture) }}" alt="product-1"
                                        width="100" height="100">
                                </div>
                                <a class="cr-shopping-bag" href="javascript:void(0)">
                                    <i class="ri-shopping-bag-line"></i>
                                </a>
                            </div>
                            <div class="cr-product-details">
                                <div class="cr-brand">
                                    <h6 href="shop-left-sidebar.html">{{ $product->name }}</h6>
                                    {{-- <div class="cr-star">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-line"></i>
                                        <p>(4.5)</p>
                                    </div> --}}
                                </div>
                                <p href="product-left-sidebar.html" class="title">{{ $product->desc }}</p>
                                {{-- <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod
                                    tempor incididunt ut labore lacus vel facilisis.</p>
                                <ul class="list">
                                    <li><label>Brand :</label>ESTA BETTERU CO</li>
                                    <li><label>Diet Type :</label>Vegetarian</li>
                                    <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                </ul> --}}
                                <p class="cr-price"><span class="new-price">${{ $product->price }}</span></p>
                                @if (auth()->check() && auth()->user()->role == 'buyer')
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
                        <li>{{ $products->links() }}</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
@endsection
