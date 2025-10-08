@extends('frontend.layout.main')
@section('content')
 <div class="breadcumb-wrapper overflow-hidden" data-bg-src="{{ asset('assets/img/bg/breadcumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcumb-content">
                        <h1 class="breadcumb-title">News & Blogs</h1>
                        <ul class="breadcumb-menu">
                            <li><a href="index.html">Home</a></li>
                            <li>Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="th-blog-wrapper space-top space-extra-bottom overflow-hidden">
        <div class="container">
            <div class="row gx-40">
                <div class="col-xxl-9 col-lg-8">
                    <div class="th-blog blog-single has-post-thumbnail">
                        <div class="blog-img"><a href="blog-details.html"><img src={{ asset('assets/img/blog/blog-s-1-1.jpg') }}
                                    alt="Blog Image"></a></div>
                        <div class="blog-content">
                            <div class="blog-meta"><a class="author" href="blog.html"><i class="fal fa-user"></i>By
                                    Jonson</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>21 June, 2025</a>
                            </div>
                            <h2 class="blog-title"><a href="blog-details.html">Is Fast Food Getting Healthier? Here’s
                                    What We’re Doing</a></h2>
                            <p class="blog-text">We believe great food starts with great ingredients. That’s why we use
                                only the freshest produce, premium meats, and quality toppings — nothing artificial,
                                always delicious. Hungry and in a hurry? No problem. We deliver mouthwatering meals
                                fast, without compromising on taste or quality. Because fast food should still feel like
                                real food. welcoming, fun, and casual atmosphere for everyone.</p><a
                                href="blog-details.html" class="th-btn btn-mask btn-sm style2">READ MORE</a>
                        </div>
                    </div>
                    <div class="th-blog blog-single has-post-thumbnail">
                        <div class="blog-img th-slider" data-slider-options='{"effect":"fade"}'>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><a href="blog-details.html"><img
                                            src="{{ asset('assets/img/blog/blog-s-1-1.jpg') }}" alt="Blog Image"></a></div>
                                <div class="swiper-slide"><a href="blog-details.html"><img
                                            src="{{ asset('assets/img/blog/blog-s-1-2.jpg') }}" alt="Blog Image"></a></div>
                            </div><button class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>
                            <button class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta"><a class="author" href="blog.html"><i class="fal fa-user"></i>By
                                    Barab</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>22 June, 2025</a>
                            </div>
                            <h2 class="blog-title"><a href="blog-details.html">New Restaurant Town Our Ple Award
                                    Contract</a></h2>
                            <p class="blog-text">We believe great food starts with great ingredients. That’s why we use
                                only the freshest produce, premium meats, and quality toppings — nothing artificial,
                                always delicious. Hungry and in a hurry? No problem. We deliver mouthwatering meals
                                fast, without compromising on taste or quality. Because fast food should still feel like
                                real food. welcoming, fun, and casual atmosphere for everyone.</p><a
                                href="blog-details.html" class="th-btn btn-mask btn-sm style2">Read More</a>
                        </div>
                    </div>
                    <div class="th-blog blog-single">
                        <div class="blog-content">
                            <div class="blog-meta"><a class="author" href="blog.html"><i class="fal fa-user"></i>By
                                    Barab</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>24 June, 2025</a>
                            </div>
                            <h2 class="blog-title"><a href="blog-details.html">This So Trendy Restaurant That
                                    Everyone</a></h2>
                            <p class="blog-text">We believe great food starts with great ingredients. That’s why we use
                                only the freshest produce, premium meats, and quality toppings — nothing artificial,
                                always delicious. Hungry and in a hurry? No problem. We deliver mouthwatering meals
                                fast, without compromising on taste or quality. Because fast food should still feel like
                                real food. welcoming, fun, and casual atmosphere for everyone.</p><a
                                href="blog-details.html" class="th-btn btn-mask btn-sm style2">Read More</a>
                        </div>
                    </div>
                    <div class="th-blog blog-single has-post-thumbnail">
                        <div class="blog-img" data-overlay="black" data-opacity="5"><a href="blog-details.html"><img
                                    src="{{ asset('assets/img/blog/blog-s-1-3.jpg') }}" alt="Blog Image"></a><a
                                href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn popup-video"><i
                                    class="fas fa-play"></i></a></div>
                        <div class="blog-content">
                            <div class="blog-meta"><a class="author" href="blog.html"><i class="fal fa-user"></i>By
                                    Barab</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>25 June, 2025</a>
                            </div>
                            <h2 class="blog-title"><a href="blog-details.html">Innovative Hot Chessyraw Make
                                    Creator.</a></h2>
                            <p class="blog-text">We believe great food starts with great ingredients. That’s why we use
                                only the freshest produce, premium meats, and quality toppings — nothing artificial,
                                always delicious. Hungry and in a hurry? No problem. We deliver mouthwatering meals
                                fast, without compromising on taste or quality. Because fast food should still feel like
                                real food. welcoming, fun, and casual atmosphere for everyone.</p><a
                                href="blog-details.html" class="th-btn btn-mask btn-sm style-radius">Read More</a>
                        </div>
                    </div>
                    <div class="th-blog blog-single has-post-thumbnail">
                        <div class="blog-audio"><iframe title="Tell Me U Luv Me (with Trippie Redd) by Juice WRLD"
                                src="https://w.soundcloud.com/player/?visual=true&amp;url=https%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F830279092&amp;show_artwork=true&amp;maxwidth=751&amp;maxheight=1000&amp;dnt=1"></iframe>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta"><a class="author" href="blog.html"><i class="fal fa-user"></i>By
                                    Barab</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>26 June, 2025</a>
                            </div>
                            <h2 class="blog-title"><a href="blog-details.html">Is Fast Food Getting Healthier? Here’s
                                    What We’re Doing</a></h2>
                            <p class="blog-text">We believe great food starts with great ingredients. That’s why we use
                                only the freshest produce, premium meats, and quality toppings — nothing artificial,
                                always delicious. Hungry and in a hurry? No problem. We deliver mouthwatering meals
                                fast, without compromising on taste or quality. Because fast food should still feel like
                                real food. welcoming, fun, and casual atmosphere for everyone.</p><a
                                href="blog-details.html" class="th-btn btn-mask btn-sm style2">Read More</a>
                        </div>
                    </div>
                    <div class="th-pagination">
                        <ul>
                            <li><a href="blog.html"><i class="fas fa-arrow-left"></i></a></li>
                            <li><a href="blog.html">1</a></li>
                            <li><a href="blog.html">2</a></li>
                            <li><a href="blog.html"><i class="fas fa-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-3 col-lg-4">
                    <aside class="sidebar-area">
                        <div class="widget widget_search">
                            <h3 class="widget_title">Search Here</h3>
                            <form class="search-form"><input type="text" placeholder="Search here..."> <button
                                    type="submit"><i class="far fa-search"></i></button></form>
                        </div>
                        <div class="widget widget_categories">
                            <h3 class="widget_title">Categories</h3>
                            <ul>
                                <li><a href="blog.html">Burger</a> <span>(8)</span></li>
                                <li><a href="blog.html">Pizza</a> <span>(10)</span></li>
                                <li><a href="blog.html">Combo</a> <span>(12)</span></li>
                                <li><a href="blog.html">Chicken</a> <span>(6)</span></li>
                                <li><a href="blog.html">Drinks</a> <span>(8)</span></li>
                            </ul>
                        </div>
                        <div class="widget">
                            <h3 class="widget_title">Recent Posts</h3>
                            <div class="recent-post-wrap">
                                <div class="recent-post">
                                    <div class="media-img"><a href="blog-details.html"><img
                                                src="{{ asset('assets/img/blog/recent-post-1-1.jpg') }}" alt="Blog Image"></a></div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Loyalty
                                                programs for regular customers</a></h4>
                                        <div class="recent-post-meta"><a href="blog.html"><i
                                                    class="far fa-calendar"></i>21 June, 2025</a></div>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="media-img"><a href="blog-details.html"><img
                                                src="{{ asset('assets/img/blog/recent-post-1-2.jpg') }}" alt="Blog Image"></a></div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Donating
                                                surplus food to local charities</a></h4>
                                        <div class="recent-post-meta"><a href="blog.html"><i
                                                    class="far fa-calendar"></i>22 June, 2025</a></div>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="media-img"><a href="blog-details.html"><img
                                                src="{{ asset('assets/img/blog/recent-post-1-3.jpg') }}" alt="Blog Image"></a></div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Online
                                                or phone orders for pick-up</a></h4>
                                        <div class="recent-post-meta"><a href="blog.html"><i
                                                    class="far fa-calendar"></i>23 June, 2025</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget widget_tag_cloud">
                            <h3 class="widget_title">Popular Tags</h3>
                            <div class="tagcloud"><a href="blog.html">Fast Foods</a> <a href="blog.html">Lunch</a> <a
                                    href="blog.html">Restaurant</a> <a href="blog.html">Burger</a> <a
                                    href="blog.html">Dinner</a> <a href="blog.html">Chicken</a></div>
                        </div>
                        <div class="widget widget_banner" data-bg-src="{{ asset('assets/img/widget/sidebar-banner.jpg') }}">
                            <div class="widget-banner text-center"><a href="contact.html"
                                    class="th-btn btn-mask btn-sm style3">Order Now</a>
                                <p class="text-des">Hungry and in a hurry? No problem. We deliver mouthwatering.</p>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

@endsection