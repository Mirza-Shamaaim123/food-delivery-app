@extends('frontend.layout.main')
@section('content')
    <div class="breadcumb-wrapper overflow-hidden" data-bg-src="{{ asset('assets/img/bg/breadcumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcumb-content">
                        <h1 class="breadcumb-title">Shop Details</h1>
                        <ul class="breadcumb-menu">
                            <li><a href="index.html">Home</a></li>
                            <li>Shop Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="product-details space-top space-extra-bottom">
        <div class="container">
            <div class="row gx-60">
                <div class="col-lg-6">
                    <div class="product-big-img">
                        <div class="food-mask" data-mask-src="{{ asset('assets/img/bg/menu-1-msk-bg.png') }}"></div>
                        <div class="img">
                            {{-- Product ki image --}}
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 align-self-center">
                    <div class="product-about">
                        {{-- Name --}}
                        <h2 class="product-title">{{ $product->name }}</h2>

                        {{-- Rating Static/Dynamic (agar rating table banayi ho to) --}}
                        <div class="product-rating">
                            ⭐⭐⭐⭐⭐
                        </div>

                        {{-- Description --}}
                        <p class="text pe-xl-5">{{ $product->description }}</p>

                        {{-- Price with Sale Price --}}
                        <p class="price">
                            ${{ $product->sale_price ?? $product->price }}
                            @if ($product->sale_price)
                                <del>${{ $product->price }}</del>
                            @endif
                        </p>

                        {{-- Stock --}}
                        <div class="mt-2 link-inherit">
                            <p>
                                <strong class="text-title me-3">Availability:</strong>
                                @if ($product->in_stock)
                                    <span class="stock in-stock">
                                        <i class="far fa-check-square me-2 ms-1"></i> In Stock
                                    </span>
                                @else
                                    <span class="stock out-of-stock">Out of Stock</span>
                                @endif
                            </p>
                        </div>
                        <div class="actions">
                            <div class="quantity"><button class="quantity-minus qty-btn"><i
                                        class="fa-solid fa-minus"></i></button> <input type="number" class="qty-input"
                                    step="1" min="1" max="100" name="quantity" value="1" title="Qty"> <button
                                    class="quantity-plus qty-btn"><i class="fa-solid fa-plus"></i></button></div><button
                                class="th-btn style2">Add to Cart</button> <a href="wishlist.html" class="icon-btn"><i
                                    class="far fa-heart"></i></a>
                        </div>

                        {{-- SKU + Category + Tags --}}
                        <div class="product_meta">
                            <span class="sku_wrapper">SKU: <span class="sku">{{ $product->sku ?? 'N/A' }}</span></span>

                            <span class="posted_in">Category:
                                <a href="#">{{ $product->category->name ?? 'Uncategorized' }}</a>
                            </span>

                            <span>Tags:
                                {{-- @foreach ($product->tags as $tag)
                                    <a href="#">{{ $tag->name }}</a>{{ !$loop->last ? ',' : '' }}
                                @endforeach --}}
                                @foreach ($product->tags as $tag)
                                    <a href="#">{{ $tag->name }}</a>{{ !$loop->last ? ',' : '' }}
                                @endforeach
                            </span>

                        </div>
                    </div>
                </div>
            </div>

            {{-- Tabs --}}
            <ul class="nav product-tab-style1" id="productTab" role="tablist">
                <li class="nav-item" role="presentation"><a class="nav-link th-btn btn-mask style4" id="description-tab"
                        data-bs-toggle="tab" href="#description" role="tab" aria-controls="description"
                        aria-selected="false">Product Description</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link th-btn btn-mask style4 active"
                        id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                        aria-selected="true">Customer Reviews</a></li>
            </ul> 
            <div class="tab-content" id="productTabContent">

                <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <div class="review-wrapper">
                        <div class="thumb"><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" alt="img"></div>
                        <div class="content">
                              <p class="text pe-xl-5">{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
                














                  <div class="tab-pane fade show active" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <div class="woocommerce-Reviews">
                        <div class="th-comments-wrap">
                            <ul class="comment-list">
                                <li class="review th-comment-item">
                                    <div class="th-post-comment">
                                        <div class="comment-avater"><img src="{{ asset('assets/img/blog/comment-author-1.jpg') }}"
                                                alt="Comment Author"></div>
                                        <div class="comment-content">
                                            <h4 class="name">Adam Jhon</h4><span class="commented-on"><i
                                                    class="far fa-calendar"></i>22 July, 2025</span>
                                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span
                                                    style="width:100%">Rated <strong class="rating">5.00</strong> out of
                                                    5 based on <span class="rating">1</span> customer rating</span>
                                            </div>
                                            <p class="text">This product is very much qualityful and I love this working
                                                system and speed.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="review th-comment-item">
                                    <div class="th-post-comment">
                                        <div class="comment-avater"><img src="{{ asset('assets/img/blog/comment-author-2.jpg') }}"
                                                alt="Comment Author"></div>
                                        <div class="comment-content">
                                            <h4 class="name">Jusctin Dacon</h4><span class="commented-on"><i
                                                    class="far fa-calendar"></i>26 July, 2025</span>
                                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span
                                                    style="width:100%">Rated <strong class="rating">5.00</strong> out of
                                                    5 based on <span class="rating">1</span> customer rating</span>
                                            </div>
                                            <p class="text">They delivered the product in a few time. Product quality is
                                                also very good.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="review th-comment-item">
                                    <div class="th-post-comment">
                                        <div class="comment-avater"><img src="{{ asset('assets/img/blog/comment-author-3.jpg') }}"
                                                alt="Comment Author"></div>
                                        <div class="comment-content">
                                            <h4 class="name">Jacklin July</h4><span class="commented-on"><i
                                                    class="far fa-calendar"></i>26 July, 2025</span>
                                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span
                                                    style="width:100%">Rated <strong class="rating">5.00</strong> out of
                                                    5 based on <span class="rating">1</span> customer rating</span>
                                            </div>
                                            <p class="text">Their product and service is very satisfying. I highly
                                                recommend their services.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="review th-comment-item">
                                    <div class="th-post-comment">
                                        <div class="comment-avater"><img src="{{ asset('assets/img/blog/comment-author-4.jpg') }}"
                                                alt="Comment Author"></div>
                                        <div class="comment-content">
                                            <h4 class="name">Adison Smith</h4><span class="commented-on"><i
                                                    class="far fa-calendar"></i>26 July, 2025</span>
                                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span
                                                    style="width:100%">Rated <strong class="rating">5.00</strong> out of
                                                    5 based on <span class="rating">1</span> customer rating</span>
                                            </div>
                                            <p class="text">I am just in love with this product. Their service is also
                                                very good you can also try.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="th-comment-form">
                            <div class="form-title">
                                <h3 class="blog-inner-title">Add a review</h3>
                            </div>
                            <div class="row">
                                <div class="form-group rating-select d-flex align-items-center"><label>Your
                                        Rating</label>
                                    <p class="stars"><span><a class="star-1" href="#">1</a> <a class="star-2"
                                                href="#">2</a> <a class="star-3" href="#">3</a> <a class="star-4"
                                                href="#">4</a> <a class="star-5" href="#">5</a></span></p>
                                </div>
                                <div class="col-12 form-group"><textarea placeholder="Write a Message"
                                        class="form-control"></textarea> <i class="text-title far fa-pencil-alt"></i>
                                </div>
                                <div class="col-md-6 form-group"><input type="text" placeholder="Your Name"
                                        class="form-control"> <i class="text-title far fa-user"></i>
                                    </div>
                                <div class="col-md-6 form-group"><input type="text" placeholder="Your Email"
                                        class="form-control"> <i class="text-title far fa-envelope"></i>
                                    </div>
                                <div class="col-12 form-group"><input id="reviewcheck" name="reviewcheck"
                                        type="checkbox"> <label for="reviewcheck">Save my name, email, and website in
                                        this browser for the next time I comment.<span class="checkmark"></span></label>
                                </div>
                                <div class="col-12 form-group mb-0"><button class="th-btn style2 style-radius">Post
                                        Review</button></div>
                            </div>
                        </div>
                    </div>
                </div> 
        </div>










            </div>


           
        {{-- <div class="space-extra-top mb-30">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="title-area text-center mb-60"><span
                                class="sub-title style-2 text-anime-style-1">Products</span>
                            <h2 class="sec-title text-anime-style-2"> Related Products</h2>
                            <p class="box-text pe-xl-5 ps-xl-5 text-anime-style-3">From our juicy burgers to our crispy
                                fries and hand-tossed pizzas, every item is crafted with unique house-made sauces.</p>
                        </div>
                    </div>
                </div>
                <div class="slider-area">
                    <div class="swiper th-slider" id="productSlider1"
                        data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="th-product product-grid">
                                    <div class="product-img">
                                        <div class="food-mask" data-mask-src="{{ asset('assets/img/bg/menu-1-msk-bg.png') }}"></div>
                                        <img src="{{ asset('assets/img/product/product_1_1.png') }}" alt="Product Image">
                                        <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                                    class="far fa-eye"></i></a> <a href="cart.html" class="icon-btn"><i
                                                    class="far fa-cart-plus"></i></a> <a href="wishlist.html"
                                                class="icon-btn"><i class="far fa-heart"></i></a></div>
                                    </div>
                                    <div class="product-content">
                                        <div class="woocommerce-product-rating"><span class="count"></span>
                                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span
                                                        class="rating">1</span> customer rating</span></div>
                                        </div>
                                        <h3 class="product-title"><a href="shop-details.html">Smoked Salmon Bagel</a>
                                        </h3><span class="price">$39.85</span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="th-product product-grid">
                                    <div class="product-img">
                                        <div class="food-mask" data-mask-src="{{ asset('assets/img/bg/menu-1-msk-bg.png') }}"></div>
                                        <img src="{{ asset('assets/img/product/product_1_2.png') }}" alt="Product Image">
                                        <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                                    class="far fa-eye"></i></a> <a href="cart.html" class="icon-btn"><i
                                                    class="far fa-cart-plus"></i></a> <a href="wishlist.html"
                                                class="icon-btn"><i class="far fa-heart"></i></a></div>
                                    </div>
                                    <div class="product-content">
                                        <div class="woocommerce-product-rating"><span class="count"></span>
                                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span
                                                        class="rating">1</span> customer rating</span></div>
                                        </div>
                                        <h3 class="product-title"><a href="shop-details.html">Italiano Pizza</a></h3>
                                        <span class="price">$96.85</span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="th-product product-grid">
                                    <div class="product-img">
                                        <div class="food-mask" data-mask-src="{{ asset('assets/img/bg/menu-1-msk-bg.png') }}"></div>
                                        <img src="{{ asset('assets/img/product/product_1_3.png') }}" alt="Product Image">
                                        <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                                    class="far fa-eye"></i></a> <a href="cart.html" class="icon-btn"><i
                                                    class="far fa-cart-plus"></i></a> <a href="wishlist.html"
                                                class="icon-btn"><i class="far fa-heart"></i></a></div>
                                    </div>
                                    <div class="product-content">
                                        <div class="woocommerce-product-rating"><span class="count"></span>
                                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span
                                                        class="rating">1</span> customer rating</span></div>
                                        </div>
                                        <h3 class="product-title"><a href="shop-details.html">Fry Chicken Ball</a></h3>
                                        <span class="price">$177.85</span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="th-product product-grid">
                                    <div class="product-img">
                                        <div class="food-mask" data-mask-src="{{ asset('assets/img/bg/menu-1-msk-bg.png') }}"></div>
                                        <img src="{{ asset('assets/img/product/product_1_4.png') }}" alt="Product Image">
                                        <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                                    class="far fa-eye"></i></a> <a href="cart.html" class="icon-btn"><i
                                                    class="far fa-cart-plus"></i></a> <a href="wishlist.html"
                                                class="icon-btn"><i class="far fa-heart"></i></a></div>
                                    </div>
                                    <div class="product-content">
                                        <div class="woocommerce-product-rating"><span class="count"></span>
                                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span
                                                        class="rating">1</span> customer rating</span></div>
                                        </div>
                                        <h3 class="product-title"><a href="shop-details.html">Bacon Italian Pizza</a>
                                        </h3><span class="price">$32.85</span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="th-product product-grid">
                                    <div class="product-img">
                                        <div class="food-mask" data-mask-src="{{ asset('assets/img/bg/menu-1-msk-bg.png') }}"></div>
                                        <img src="{{ asset('assets/img/product/product_1_5.png') }}" alt="Product Image">
                                        <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                                    class="far fa-eye"></i></a> <a href="cart.html" class="icon-btn"><i
                                                    class="far fa-cart-plus"></i></a> <a href="wishlist.html"
                                                class="icon-btn"><i class="far fa-heart"></i></a></div>
                                    </div>
                                    <div class="product-content">
                                        <div class="woocommerce-product-rating"><span class="count"></span>
                                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span
                                                        class="rating">1</span> customer rating</span></div>
                                        </div>
                                        <h3 class="product-title"><a href="shop-details.html">Delicious Black Burger</a>
                                        </h3><span class="price">$08.85<del>$06.99</del></span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="th-product product-grid">
                                    <div class="product-img">
                                        <div class="food-mask" data-mask-src="{{ asset('assets/img/bg/menu-1-msk-bg.png') }}"></div>
                                        <img src="{{ asset('assets/img/product/product_1_6.png') }}" alt="Product Image">
                                        <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                                    class="far fa-eye"></i></a> <a href="cart.html" class="icon-btn"><i
                                                    class="far fa-cart-plus"></i></a> <a href="wishlist.html"
                                                class="icon-btn"><i class="far fa-heart"></i></a></div>
                                    </div>
                                    <div class="product-content">
                                        <div class="woocommerce-product-rating"><span class="count"></span>
                                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span
                                                        class="rating">1</span> customer rating</span></div>
                                        </div>
                                        <h3 class="product-title"><a href="shop-details.html">Burger & Fries Combo</a>
                                        </h3><span class="price">$30.85</span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="th-product product-grid">
                                    <div class="product-img">
                                        <div class="food-mask" data-mask-src="{{ asset('assets/img/bg/menu-1-msk-bg.png') }}"></div>
                                        <img src="{{ asset('assets/img/product/product_1_7.png') }}" alt="Product Image">
                                        <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                                    class="far fa-eye"></i></a> <a href="cart.html" class="icon-btn"><i
                                                    class="far fa-cart-plus"></i></a> <a href="wishlist.html"
                                                class="icon-btn"><i class="far fa-heart"></i></a></div>
                                    </div>
                                    <div class="product-content">
                                        <div class="woocommerce-product-rating"><span class="count"></span>
                                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span
                                                        class="rating">1</span> customer rating</span></div>
                                        </div>
                                        <h3 class="product-title"><a href="shop-details.html">Hand Dumbbell</a></h3>
                                        <span class="price">$232.85</span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="th-product product-grid">
                                    <div class="product-img">
                                        <div class="food-mask" data-mask-src="{{ asset('assets/img/bg/menu-1-msk-bg.png') }}"></div>
                                        <img src="{{ asset('assets/img/product/product_1_8.png') }}" alt="Product Image">
                                        <div class="actions"><a href="#QuickView" class="icon-btn popup-content"><i
                                                    class="far fa-eye"></i></a> <a href="cart.html" class="icon-btn"><i
                                                    class="far fa-cart-plus"></i></a> <a href="wishlist.html"
                                                class="icon-btn"><i class="far fa-heart"></i></a></div>
                                    </div>
                                    <div class="product-content">
                                        <div class="woocommerce-product-rating"><span class="count"></span>
                                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span
                                                        class="rating">1</span> customer rating</span></div>
                                        </div>
                                        <h3 class="product-title"><a href="shop-details.html">pepperoni pizza</a></h3>
                                        <span class="price">$30.85</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
@endsection
