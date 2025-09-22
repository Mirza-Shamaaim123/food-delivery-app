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
                {{-- <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <div class="food-mask" data-mask-src="assets/img/bg/menu-1-msk-bg.png"></div><img
                                src="assets/img/product/product_1_1.png" alt="Product Image">
                            <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                        class="far fa-eye"></i></a> <a href="cart.html" class="icon-btn"><i
                                        class="far fa-cart-plus"></i></a> <a href="wishlist.html" class="icon-btn"><i
                                        class="far fa-heart"></i></a></div>
                        </div>
                        <div class="product-content">
                            <div class="woocommerce-product-rating"><span class="count"></span>
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span>Rated <strong
                                            class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                        customer rating</span></div>
                            </div>
                            <h3 class="product-title"><a href="shop-details.html">Smoked Salmon Bagel</a></h3><span
                                class="price">$39.85</span>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <div class="food-mask" data-mask-src="assets/img/bg/menu-1-msk-bg.png"></div><img
                                src="assets/img/product/product_1_2.png" alt="Product Image">
                            <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                        class="far fa-eye"></i></a> <a href="cart.html" class="icon-btn"><i
                                        class="far fa-cart-plus"></i></a> <a href="wishlist.html" class="icon-btn"><i
                                        class="far fa-heart"></i></a></div>
                        </div>
                        <div class="product-content">
                            <div class="woocommerce-product-rating"><span class="count"></span>
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span>Rated <strong
                                            class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                        customer rating</span></div>
                            </div>
                            <h3 class="product-title"><a href="shop-details.html">Italiano Pizza</a></h3><span
                                class="price">$96.85</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <div class="food-mask" data-mask-src="assets/img/bg/menu-1-msk-bg.png"></div><img
                                src="assets/img/product/product_1_3.png" alt="Product Image">
                            <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                        class="far fa-eye"></i></a> <a href="cart.html" class="icon-btn"><i
                                        class="far fa-cart-plus"></i></a> <a href="wishlist.html" class="icon-btn"><i
                                        class="far fa-heart"></i></a></div>
                        </div>
                        <div class="product-content">
                            <div class="woocommerce-product-rating"><span class="count"></span>
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span>Rated <strong
                                            class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                        customer rating</span></div>
                            </div>
                            <h3 class="product-title"><a href="shop-details.html">Fry Chicken Ball</a></h3><span
                                class="price">$177.85</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <div class="food-mask" data-mask-src="assets/img/bg/menu-1-msk-bg.png"></div><img
                                src="assets/img/product/product_1_4.png" alt="Product Image">
                            <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                        class="far fa-eye"></i></a> <a href="cart.html" class="icon-btn"><i
                                        class="far fa-cart-plus"></i></a> <a href="wishlist.html" class="icon-btn"><i
                                        class="far fa-heart"></i></a></div>
                        </div>
                        <div class="product-content">
                            <div class="woocommerce-product-rating"><span class="count"></span>
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span>Rated <strong
                                            class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                        customer rating</span></div>
                            </div>
                            <h3 class="product-title"><a href="shop-details.html">Bacon Italian Pizza</a></h3><span
                                class="price">$32.85</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <div class="food-mask" data-mask-src="assets/img/bg/menu-1-msk-bg.png"></div><img
                                src="assets/img/product/product_1_5.png" alt="Product Image">
                            <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                        class="far fa-eye"></i></a> <a href="cart.html" class="icon-btn"><i
                                        class="far fa-cart-plus"></i></a> <a href="wishlist.html" class="icon-btn"><i
                                        class="far fa-heart"></i></a></div>
                        </div>
                        <div class="product-content">
                            <div class="woocommerce-product-rating"><span class="count"></span>
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span>Rated <strong
                                            class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                        customer rating</span></div>
                            </div>
                            <h3 class="product-title"><a href="shop-details.html">Delicious Black Burger</a></h3><span
                                class="price">$08.85<del>$06.99</del></span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <div class="food-mask" data-mask-src="assets/img/bg/menu-1-msk-bg.png"></div><img
                                src="assets/img/product/product_1_6.png" alt="Product Image">
                            <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                        class="far fa-eye"></i></a> <a href="cart.html" class="icon-btn"><i
                                        class="far fa-cart-plus"></i></a> <a href="wishlist.html" class="icon-btn"><i
                                        class="far fa-heart"></i></a></div>
                        </div>
                        <div class="product-content">
                            <div class="woocommerce-product-rating"><span class="count"></span>
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span>Rated <strong
                                            class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                        customer rating</span></div>
                            </div>
                            <h3 class="product-title"><a href="shop-details.html">Burger & Fries Combo</a></h3><span
                                class="price">$30.85</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <div class="food-mask" data-mask-src="assets/img/bg/menu-1-msk-bg.png"></div><img
                                src="assets/img/product/product_1_7.png" alt="Product Image">
                            <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                        class="far fa-eye"></i></a> <a href="cart.html" class="icon-btn"><i
                                        class="far fa-cart-plus"></i></a> <a href="wishlist.html" class="icon-btn"><i
                                        class="far fa-heart"></i></a></div>
                        </div>
                        <div class="product-content">
                            <div class="woocommerce-product-rating"><span class="count"></span>
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span>Rated <strong
                                            class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                        customer rating</span></div>
                            </div>
                            <h3 class="product-title"><a href="shop-details.html">Hand Dumbbell</a></h3><span
                                class="price">$232.85</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <div class="food-mask" data-mask-src="assets/img/bg/menu-1-msk-bg.png"></div><img
                                src="assets/img/product/product_1_8.png" alt="Product Image">
                            <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                        class="far fa-eye"></i></a> <a href="cart.html" class="icon-btn"><i
                                        class="far fa-cart-plus"></i></a> <a href="wishlist.html" class="icon-btn"><i
                                        class="far fa-heart"></i></a></div>
                        </div>
                        <div class="product-content">
                            <div class="woocommerce-product-rating"><span class="count"></span>
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span>Rated <strong
                                            class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                        customer rating</span></div>
                            </div>
                            <h3 class="product-title"><a href="shop-details.html">pepperoni pizza</a></h3><span
                                class="price">$30.85</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <div class="food-mask" data-mask-src="assets/img/bg/menu-1-msk-bg.png"></div><img
                                src="assets/img/product/product_1_9.png" alt="Product Image">
                            <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                        class="far fa-eye"></i></a> <a href="cart.html" class="icon-btn"><i
                                        class="far fa-cart-plus"></i></a> <a href="wishlist.html" class="icon-btn"><i
                                        class="far fa-heart"></i></a></div>
                        </div>
                        <div class="product-content">
                            <div class="woocommerce-product-rating"><span class="count"></span>
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span>Rated <strong
                                            class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                        customer rating</span></div>
                            </div>
                            <h3 class="product-title"><a href="shop-details.html">Delicious Burger</a></h3><span
                                class="price">$32.85</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <div class="food-mask" data-mask-src="assets/img/bg/menu-1-msk-bg.png"></div><img
                                src="assets/img/product/product_1_10.png" alt="Product Image">
                            <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                        class="far fa-eye"></i></a> <a href="cart.html" class="icon-btn"><i
                                        class="far fa-cart-plus"></i></a> <a href="wishlist.html" class="icon-btn"><i
                                        class="far fa-heart"></i></a></div>
                        </div>
                        <div class="product-content">
                            <div class="woocommerce-product-rating"><span class="count"></span>
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span>Rated <strong
                                            class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                        customer rating</span></div>
                            </div>
                            <h3 class="product-title"><a href="shop-details.html">Tofu Sicilian Pizza</a></h3><span
                                class="price">$232.85</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <div class="food-mask" data-mask-src="assets/img/bg/menu-1-msk-bg.png"></div><img
                                src="assets/img/product/product_1_11.png" alt="Product Image">
                            <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                        class="far fa-eye"></i></a> <a href="cart.html" class="icon-btn"><i
                                        class="far fa-cart-plus"></i></a> <a href="wishlist.html" class="icon-btn"><i
                                        class="far fa-heart"></i></a></div>
                        </div>
                        <div class="product-content">
                            <div class="woocommerce-product-rating"><span class="count"></span>
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span>Rated <strong
                                            class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                        customer rating</span></div>
                            </div>
                            <h3 class="product-title"><a href="shop-details.html">Indian Momos</a></h3><span
                                class="price">$32.85</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="th-product product-grid">
                        <div class="product-img">
                            <div class="food-mask" data-mask-src="assets/img/bg/menu-1-msk-bg.png"></div><img
                                src="assets/img/product/product_1_12.png" alt="Product Image">
                            <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                        class="far fa-eye"></i></a> <a href="cart.html" class="icon-btn"><i
                                        class="far fa-cart-plus"></i></a> <a href="wishlist.html" class="icon-btn"><i
                                        class="far fa-heart"></i></a></div>
                        </div>
                        <div class="product-content">
                            <div class="woocommerce-product-rating"><span class="count"></span>
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span>Rated <strong
                                            class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                        customer rating</span></div>
                            </div>
                            <h3 class="product-title"><a href="shop-details.html">Grill Chicken Fry</a></h3><span
                                class="price">$30.85</span>
                        </div>
                    </div>
                </div> --}}
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
