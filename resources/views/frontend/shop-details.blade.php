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
                            <div class="quantity">
                                <button class="quantity-minus qty-btn"><i class="fa-solid fa-minus"></i></button> <input
                                    type="number" class="qty-input" step="1" min="1" max="100"
                                    name="quantity" value="1" title="Qty"> <button class="quantity-plus qty-btn"><i
                                        class="fa-solid fa-plus"></i></button>
                            </div>
                            <form action="{{ route('frontend.addToCart', $product->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                <button type="submit" class="th-btn style2">Add to Cart</button>
                            </form>
                            <a href="wishlist.html" class="icon-btn"><i class="far fa-heart"></i></a>
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
                <li class="nav-item" role="presentation"><a class="nav-link th-btn btn-mask style4 active" id="reviews-tab"
                        data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                        aria-selected="true">Customer Reviews</a></li>
            </ul>
            <div class="tab-content" id="productTabContent">

                <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <div class="review-wrapper">
                        <div class="thumb"><img src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}" alt="img"></div>
                        <div class="content">
                            <p class="text pe-xl-5">{{ $product->description }}</p>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show active" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <div class="woocommerce-Reviews">
                        <div class="th-comments-wrap">
                            <ul class="comment-list">
                                @foreach ($reviews as $review)
                                    <li class="review th-comment-item">
                                        <div class="th-post-comment">
                                            <div class="comment-avater">
                                                <img src="{{ $review->user->avatar ?? asset('assets/img/blog/default-avatar.png') }}"
                                                    alt="Comment Author">
                                            </div>
                                            <div class="comment-content">
                                                <h4 class="name">{{ $review->user->name ?? 'Guest User' }}</h4>
                                                <span class="commented-on">
                                                    <i class="far fa-calendar"></i>
                                                    {{ $review->created_at->format('d M, Y') }}
                                                </span>

                                                <div class="star-rating" role="img"
                                                    aria-label="Rated {{ $review->rating }} out of 5">
                                                    <span style="width:{{ ($review->rating / 5) * 100 }}%">
                                                        Rated <strong class="rating">{{ $review->rating }}</strong> out of
                                                        5
                                                    </span>
                                                </div>

                                                <p class="text">{{ $review->comment }}</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="th-comment-form">
                        <div class="form-title">
                            <h3 class="blog-inner-title">Add a review</h3>
                        </div>
                        <form action="{{ route('review.store') }}" method="POST">
                            @csrf

                            {{-- Hidden input for product_id --}}
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="row">

                                {{-- Rating --}}
                                <div class="form-group rating-select d-flex align-items-center">
                                    <label>Your Rating</label>
                                    <p class="stars">
                                        <span>
                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('star1').checked = true;">1</a>
                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('star2').checked = true;">2</a>
                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('star3').checked = true;">3</a>
                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('star4').checked = true;">4</a>
                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('star5').checked = true;">5</a>
                                        </span>
                                    </p>
                                    {{-- Hidden radio inputs --}}
                                    <input type="radio" id="star1" name="rating" value="1"
                                        style="display:none;" required>
                                    <input type="radio" id="star2" name="rating" value="2"
                                        style="display:none;" required>
                                    <input type="radio" id="star3" name="rating" value="3"
                                        style="display:none;" required>
                                    <input type="radio" id="star4" name="rating" value="4"
                                        style="display:none;" required>
                                    <input type="radio" id="star5" name="rating" value="5"
                                        style="display:none;" required>
                                </div>

                                {{-- Comment --}}
                                <div class="col-12 form-group">
                                    <textarea name="comment" placeholder="Write a Message" class="form-control" required></textarea>
                                    <i class="text-title far fa-pencil-alt"></i>
                                </div>

                                {{-- Name --}}
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" placeholder="Your Name" class="form-control"
                                        required>
                                    <i class="text-title far fa-user"></i>
                                </div>

                                {{-- Email --}}
                                <div class="col-md-6 form-group">
                                    <input type="email" name="email" placeholder="Your Email" class="form-control"
                                        required>
                                    <i class="text-title far fa-envelope"></i>
                                </div>

                                {{-- Optional checkbox --}}
                                <div class="col-12 form-group">
                                    <input id="reviewcheck" name="reviewcheck" type="checkbox">
                                    <label for="reviewcheck">Save my name, email, and website in this browser for the next
                                        time I comment.<span class="checkmark"></span></label>
                                </div>

                                {{-- Submit button --}}
                                <div class="col-12 form-group mb-0">
                                    <button type="submit" class="th-btn style2 style-radius">Post Review</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
@endsection
