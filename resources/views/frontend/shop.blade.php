@extends('frontend.layout.main')
@section('content')
<div class="breadcumb-wrapper overflow-hidden" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcumb-content">
                        <h1 class="breadcumb-title">Shop</h1>
                        <ul class="breadcumb-menu">
                            <li><a href="index.html">Home</a></li>
                            <li>Shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="space-top space-extra2-bottom">
        <div class="container">
            <div class="th-sort-bar">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md">
                        <p class="woocommerce-result-count">Showing 1–12 of 16 results</p>
                    </div>
                    <div class="col-md-auto">
                        <form class="woocommerce-ordering" method="get"><select name="orderby" class="orderby"
                                aria-label="Shop order">
                                <option value="menu_order" selected="selected">Default Sorting</option>
                                <option value="popularity">Sort by popularity</option>
                                <option value="rating">Sort by average rating</option>
                                <option value="date">Sort by latest</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select></form>
                    </div>
                </div>
            </div>
            <div class="row gy-40 gx-30">
                  @foreach($products as $product)
                   <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="th-product product-grid">
                <div class="product-img">
                    <div class="food-mask" data-mask-src="assets/img/bg/menu-1-msk-bg.png"></div>
                    
                    {{-- Product Image --}}
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    
                    <div class="actions">
                        <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                        <a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                        <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                    </div>
                </div>
                <div class="product-content">
                    {{-- Rating (optional dynamic if you have reviews table) --}}
                    <div class="woocommerce-product-rating">
                        <div class="star-rating" role="img">
                            
                        </div>
                    </div>

                    {{-- Product Title --}}
                    <h3 class="product-title">
                        <a href="{{ route('frontend.shop.details', $product->id) }}">
                            {{ $product->name }}
                        </a>
                    </h3>

                    {{-- Product Price --}}
                    <span class="price">
                        ${{ number_format($product->price, 2) }}
                    </span>
                </div>
            </div>
        </div>

                  @endforeach
            
            </div>
            <div class="th-pagination d-flex justify-content-center pt-50">
                <ul>
                    <li><a href="blog.html"><i class="fas fa-arrow-left"></i></a></li>
                    <li><a href="blog.html">1</a></li>
                    <li><a href="blog.html">2</a></li>
                    <li><a href="blog.html"><i class="fas fa-arrow-right"></i></a></li>
                </ul>
            </div>
        </div>
    </section>
@endsection
