@extends('frontend.layout.main')
@section('content')
<div class="th-hero-wrapper hero-1 bg-smoke" id="hero">
        <div class="hero-img-shape-1">
            <div class="logo-icon-wrap">
                <div class="logo-icon">
                    <h4 class="order"><a href="shop.html">ORDER YOUR BURGER</a></h4>
                </div>
                <div class="logo-icon-wrap__text"><span class="logo-animation">MAKE FRESH EAT REFRESH MAKE FRESH EAT
                        REFRESH</span></div>
            </div>
        </div>
        <div class="shape-mockup d-none d-xl-block movingX" data-top="0%" data-right="5%"><img
                src="assets/img/icon/hero-1-1.png" alt="img"></div>
        <div class="shape-mockup hero-shape-1-2 gsap-scroll-rotate" data-top="14%" data-left="1%"><img
                src="assets/img/icon/hero-1-2.png" alt="img"></div>
        <div class="shape-mockup jump-reverse hero-shape-1-3" data-top="13%" data-right="2%"><img
                src="assets/img/icon/hero-1-3.png" alt="img"></div>
        <div class="shape-mockup movingX" data-bottom="0%" data-left="5%"><img src="assets/img/icon/hero-1-4.png"
                alt="img"></div>
        <div class="shape-mockup jump hero-shape-1-5" data-bottom="0%" data-right="0%"><img
                src="assets/img/icon/hero-1-5.png" alt="img"></div>
        <div class="hero-1-bg"><img src="assets/img/bg/hero-1-bg.png" alt="img"></div>
        <div class="hero-inner">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="hero-style1"><span class="sub-title gsap-scale-down-fade">Fast Food
                                Restaurant</span>
                            <h1 class="hero-title text-anime-style-2">Delicious Fast food For today</h1>
                            <div class="hero-img1 gsap-scale-up-fade"><img src="assets/img/hero/hero-img.png"
                                    alt="Image"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="space overflow-hidden space-extra-bottom">
        <div class="container">
            <div class="title-area text-center mb-60"><span class="sub-title text-anime-style-1">Food Category</span>
                <h2 class="sec-title text-anime-style-2">Browse Fast Foods <span class="text-theme">Category</span></h2>
                <img class="img-anime-style-1" src="assets/img/icon/title-shape.png" alt="img">
            </div>
            <div class="slider-area">
                <div class="swiper th-slider" id="catSlider1"
                    data-slider-options='{"autoplay":true,"loop":true,"breakpoints":{"0":{"slidesPerView":1},"400":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"},"1400":{"slidesPerView":"6"}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="category-card"><img class="cat-i-bottom" src="assets/img/icon/cat-1-bottom.png"
                                    alt="img">
                                <div class="box-icon"><img src="assets/img/category/category_1-1.png" alt="Image"></div>
                                <h3 class="box-title"><a href="shop.html">Dominos Pizza</a></h3>
                                <p class="box-subtitle">25 Items Available</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="category-card"><img class="cat-i-bottom" src="assets/img/icon/cat-1-bottom.png"
                                    alt="img">
                                <div class="box-icon"><img src="assets/img/category/category_1-2.png" alt="Image"></div>
                                <h3 class="box-title"><a href="shop.html">Grill Chicken</a></h3>
                                <p class="box-subtitle">22 Items Available</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="category-card"><img class="cat-i-bottom" src="assets/img/icon/cat-1-bottom.png"
                                    alt="img">
                                <div class="box-icon"><img src="assets/img/category/category_1-3.png" alt="Image"></div>
                                <h3 class="box-title"><a href="shop.html">Delicious Burger</a></h3>
                                <p class="box-subtitle">23 Items Available</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="category-card"><img class="cat-i-bottom" src="assets/img/icon/cat-1-bottom.png"
                                    alt="img">
                                <div class="box-icon"><img src="assets/img/category/category_1-4.png" alt="Image"></div>
                                <h3 class="box-title"><a href="shop.html">FBox Meals</a></h3>
                                <p class="box-subtitle">22 Items Available</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="category-card"><img class="cat-i-bottom" src="assets/img/icon/cat-1-bottom.png"
                                    alt="img">
                                <div class="box-icon"><img src="assets/img/category/category_1-5.png" alt="Image"></div>
                                <h3 class="box-title"><a href="shop.html">Combo Foods</a></h3>
                                <p class="box-subtitle">20 Items Available</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="category-card"><img class="cat-i-bottom" src="assets/img/icon/cat-1-bottom.png"
                                    alt="img">
                                <div class="box-icon"><img src="assets/img/category/category_1-1.png" alt="Image"></div>
                                <h3 class="box-title"><a href="shop.html">Dominos Pizza</a></h3>
                                <p class="box-subtitle">25 Items Available</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="category-card"><img class="cat-i-bottom" src="assets/img/icon/cat-1-bottom.png"
                                    alt="img">
                                <div class="box-icon"><img src="assets/img/category/category_1-2.png" alt="Image"></div>
                                <h3 class="box-title"><a href="shop.html">Grill Chicken</a></h3>
                                <p class="box-subtitle">22 Items Available</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="category-card"><img class="cat-i-bottom" src="assets/img/icon/cat-1-bottom.png"
                                    alt="img">
                                <div class="box-icon"><img src="assets/img/category/category_1-3.png" alt="Image"></div>
                                <h3 class="box-title"><a href="shop.html">Delicious Burger</a></h3>
                                <p class="box-subtitle">23 Items Available</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="category-card"><img class="cat-i-bottom" src="assets/img/icon/cat-1-bottom.png"
                                    alt="img">
                                <div class="box-icon"><img src="assets/img/category/category_1-4.png" alt="Image"></div>
                                <h3 class="box-title"><a href="shop.html">FBox Meals</a></h3>
                                <p class="box-subtitle">22 Items Available</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="category-card"><img class="cat-i-bottom" src="assets/img/icon/cat-1-bottom.png"
                                    alt="img">
                                <div class="box-icon"><img src="assets/img/category/category_1-5.png" alt="Image"></div>
                                <h3 class="box-title"><a href="shop.html">Combo Foods</a></h3>
                                <p class="box-subtitle">20 Items Available</p>
                            </div>
                        </div>
                    </div>
                </div><button data-slider-prev="#catSlider1" class="slider-arrow slider-prev"><img
                        src="assets/img/icon/left-arrow.svg" alt=""></button> <button data-slider-next="#catSlider1"
                    class="slider-arrow slider-next"><img src="assets/img/icon/right-arrow.svg" alt=""></button>
            </div>
        </div>
    </section>
    <div class="overflow-hidden space-bottom " id="about-sec">
        <div class="shape-mockup jump-reverse d-none d-xxl-block" data-top="10%" data-left="43%"><img
                src="assets/img/shape/about-shape-1.1.png" alt="img"></div>
        <div class="shape-mockup jump d-none d-xxl-block" data-bottom="15%" data-right="1%"><img
                src="assets/img/shape/about-shape-1.2.png" alt="img"></div>
        <div class="container">
            <div class="row gy-40 gx-80 align-items-center">
                <div class="col-xl-7 ps-xl-5">
                    <div class="img-box1 ms-xl-2">
                        <div class="img1 gsap-fade-left"><img src="assets/img/about/about_1_1.png" alt="About"></div>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="title-area mb-1"><span class="sub-title text-anime-style-1">About our restaurant</span>
                        <h2 class="sec-title text-anime-style-2">We invite you to visit our Fast food <span
                                class="text-theme">Restaurant</span></h2>
                        <p class="box-text me-xl-5 pe-xl-3 wow fadeinup" data-wow-delay=".3s">At the heart of our
                            kitchen are bold flavors, high-quality ingredients, and a commitment to consistency. From
                            juicy burgers, crispy fries, and cheesy pizzas to spicy wraps and refreshing drinks, every
                            item on our menu is made to order and packed with taste.</p>
                        <div class="about-1-owner wow fadeinup" data-wow-delay=".5s">
                            <h4 class="box-title">Parvez Hossain Imon</h4>
                            <p>Restaurant owner</p>
                        </div><a href="reservation.html" class="th-btn btn-mask wow fadeinup" data-wow-delay=".7s">VISIT
                            OUR RESTAURANT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="food-sec-1 space bg-smoke overflow-hidden">
        <div class="container">
            <div class="row gy-40">
                <div class="title-area text-center mb-60"><span class="sub-title text-anime-style-1">Our Fast
                        Foods</span>
                    <h2 class="sec-title text-anime-style-2">Our Delicious Fast <span class="text-theme">Foods</span>
                    </h2><img class="img-anime-style-1" src="assets/img/icon/title-shape.png" alt="img">
                </div>
            </div>
            <div class="row gy-30">
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="food-card-1 wow fadeinleft" data-wow-delay=".2s">
                        <div class="thumb">
                            <div class="food-mask" data-mask-src="assets/img/bg/menu-1-msk-bg.png"></div><img
                                src="assets/img/food/food-1-1.png" alt="Image">
                            <div class="actions"><a href="cart.html" class="icon-btn"><i
                                        class="far fa-cart-plus"></i></a> <a href="wishlist.html" class="icon-btn"><i
                                        class="far fa-heart"></i></a></div>
                        </div>
                        <div class="content">
                            <h4 class="price">$26.00</h4>
                            <h4 class="box-title"><a href="shop-details.html">Delicious Black Burger</a></h4>
                            <p class="box-text">At the heart of our kitchen are bold flavors, high-quality ingredients
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="food-card-1 wow fadeinleft" data-wow-delay=".4s">
                        <div class="thumb">
                            <div class="food-mask" data-mask-src="assets/img/bg/menu-1-msk-bg.png"></div><img
                                src="assets/img/food/food-1-2.png" alt="Image">
                            <div class="actions"><a href="cart.html" class="icon-btn"><i
                                        class="far fa-cart-plus"></i></a> <a href="wishlist.html" class="icon-btn"><i
                                        class="far fa-heart"></i></a></div>
                        </div>
                        <div class="content">
                            <h4 class="price">$20.00</h4>
                            <h4 class="box-title"><a href="shop-details.html">Fiery Beef Stack</a></h4>
                            <p class="box-text">At the heart of our kitchen are bold flavors, high-quality ingredients
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="food-card-1 wow fadeinright" data-wow-delay=".6s">
                        <div class="thumb">
                            <div class="food-mask" data-mask-src="assets/img/bg/menu-1-msk-bg.png"></div><img
                                src="assets/img/food/food-1-3.png" alt="Image">
                            <div class="actions"><a href="cart.html" class="icon-btn"><i
                                        class="far fa-cart-plus"></i></a> <a href="wishlist.html" class="icon-btn"><i
                                        class="far fa-heart"></i></a></div>
                        </div>
                        <div class="content">
                            <h4 class="price">$16.00</h4>
                            <h4 class="box-title"><a href="shop-details.html">Golden Crispy Fries</a></h4>
                            <p class="box-text">At the heart of our kitchen are bold flavors, high-quality ingredients
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="food-card-1 wow fadeinright" data-wow-delay=".8s">
                        <div class="thumb">
                            <div class="food-mask" data-mask-src="assets/img/bg/menu-1-msk-bg.png"></div><img
                                src="assets/img/food/food-1-4.png" alt="Image">
                            <div class="actions"><a href="cart.html" class="icon-btn"><i
                                        class="far fa-cart-plus"></i></a> <a href="wishlist.html" class="icon-btn"><i
                                        class="far fa-heart"></i></a></div>
                        </div>
                        <div class="content">
                            <h4 class="price">$36.00</h4>
                            <h4 class="box-title"><a href="shop-details.html">Tangy Grilled Sandwich</a></h4>
                            <p class="box-text">At the heart of our kitchen are bold flavors, high-quality ingredients
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="history-sec1 bg-theme2 overflow-hidden" id="history-sec"><img class="round-shape-bottom"
            src="assets/img/shape/shape-bottom.png" alt="img">
        <div class="container">
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-6">
                    <div class="history-img"><img src="assets/img/history/history-main.jpg" alt="img"></div>
                </div>
                <div class="col-lg-6">
                    <div class="history-content-wrap ps-xl-5">
                        <div class="title-area mb-40"><span class="sub-title text-anime-style-1">Our History</span>
                            <h2 class="sec-title text-anime-style-2 text-white">A History of restaurant</h2><img
                                class="img-anime-style-1" src="assets/img/icon/title-shape2.png" alt="img">
                        </div>
                        <div class="history-box-1 wow fadeinup" data-wow-delay=".2s">
                            <div class="content">
                                <h4 class="year">1998</h4>
                                <h3 class="box-title">Evolution of Restaurants</h3>
                                <p class="box-text pe-xxl-5 me-xl-5">At the heart of our kitchen are bold flavors,
                                    high-quality ingredients, and a commitment to consistency.</p>
                            </div>
                            <div class="thumb global-img"><img src="assets/img/history/history-sm-1-1.jpg" alt="img">
                            </div>
                        </div>
                        <div class="history-box-1 wow fadeinup" data-wow-delay=".4s">
                            <div class="content">
                                <h4 class="year">2016</h4>
                                <h3 class="box-title">Fine Dining & the Concept</h3>
                                <p class="box-text pe-xxl-5 me-xl-5">At the heart of our kitchen are bold flavors,
                                    high-quality ingredients, and a commitment to consistency.</p>
                            </div>
                            <div class="thumb global-img"><img src="assets/img/history/history-sm-1-2.jpg" alt="img">
                            </div>
                        </div>
                        <div class="history-box-1 wow fadeinup" data-wow-delay=".6s">
                            <div class="content">
                                <h4 class="year">2025</h4>
                                <h3 class="box-title">Modern Fast Food Origins</h3>
                                <p class="box-text pe-xxl-5 me-xl-5">At the heart of our kitchen are bold flavors,
                                    high-quality ingredients, and a commitment to consistency.</p>
                            </div>
                            <div class="thumb global-img"><img src="assets/img/history/history-sm-1-3.jpg" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-sec1 space-top overflow-hidden" id="menu-sec">
        <div class="container">
            <div class="title-area text-center mb-40"><span class="sub-title text-anime-style-1">Menu Card</span>
                <h2 class="sec-title text-anime-style-2">Our Fast Foods <span class="text-theme">Menu Card</span></h2>
                <img class="img-anime-style-1" src="assets/img/icon/title-shape.png" alt="img">
            </div>
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-3">
                    <div class="menu-img-1-1 gsap-scroll-float-down2"><img src="assets/img/menu/menu-1-1.jpg" alt="img">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="menu-1-content-wrap ps-xl-3 pe-xl-5">
                        <ul class="nav nav-tabs wow fadeinup" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation"><button class="nav-link active"
                                    id="event-creating-tab" data-bs-toggle="tab" data-bs-target="#event-creating"
                                    type="button" role="tab" aria-controls="event-creating" aria-selected="true">Event
                                    Creating</button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="meal-plans-tab"
                                    data-bs-toggle="tab" data-bs-target="#meal-plans" type="button" role="tab"
                                    aria-controls="meal-plans" aria-selected="false">Meal Plans</button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="food-delivery-tab"
                                    data-bs-toggle="tab" data-bs-target="#food-delivery" type="button" role="tab"
                                    aria-controls="food-delivery" aria-selected="false">Food Delivery</button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="diet-plans-tab"
                                    data-bs-toggle="tab" data-bs-target="#diet-plans" type="button" role="tab"
                                    aria-controls="diet-plans" aria-selected="false">Diet Plans</button></li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="event-creating" role="tabpanel"
                                aria-labelledby="event-creating-tab">
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".2s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-1.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">Grilled Salmon with Dil
                                                    Sauce</a></h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 40</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".3s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-2.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">Roast Beef with
                                                    Vegetable</a></h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 60</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".4s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-3.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">Marrakesh Vegetarian
                                                    Curry</a></h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 30</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".5s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-4.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">Spicy Vegan Potato
                                                    Curry</a></h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 50</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".6s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-5.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">Apple Pie with Cream</a>
                                            </h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 80</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".7s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-6.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">French Onion Soup</a></h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 28</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="meal-plans" role="tabpanel" aria-labelledby="meal-plans-tab">
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".2s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-1.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">Grilled Salmon with Dil
                                                    Sauce</a></h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 40</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".3s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-2.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">Roast Beef with
                                                    Vegetable</a></h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 60</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".4s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-3.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">Marrakesh Vegetarian
                                                    Curry</a></h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 30</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".5s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-4.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">Spicy Vegan Potato
                                                    Curry</a></h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 50</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".6s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-5.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">Apple Pie with Cream</a>
                                            </h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 80</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".7s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-6.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">French Onion Soup</a></h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 28</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="food-delivery" role="tabpanel"
                                aria-labelledby="food-delivery-tab">
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".2s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-1.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">Grilled Salmon with Dil
                                                    Sauce</a></h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 40</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".3s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-2.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">Roast Beef with
                                                    Vegetable</a></h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 60</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".4s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-3.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">Marrakesh Vegetarian
                                                    Curry</a></h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 30</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".5s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-4.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">Spicy Vegan Potato
                                                    Curry</a></h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 50</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".6s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-5.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">Apple Pie with Cream</a>
                                            </h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 80</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".7s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-6.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">French Onion Soup</a></h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 28</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="diet-plans" role="tabpanel" aria-labelledby="diet-plans-tab">
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".2s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-1.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">Grilled Salmon with Dil
                                                    Sauce</a></h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 40</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".3s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-2.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">Roast Beef with
                                                    Vegetable</a></h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 60</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".4s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-3.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">Marrakesh Vegetarian
                                                    Curry</a></h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 30</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".5s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-4.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">Spicy Vegan Potato
                                                    Curry</a></h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 50</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".6s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-5.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">Apple Pie with Cream</a>
                                            </h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 80</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item-1 wow fadeinup" data-wow-delay=".7s">
                                    <div class="thumb global-img" data-mask-src="assets/img/bg/menu-1-msk-bg.jpg"><img
                                            src="assets/img/menu/menu-1-item-1-6.jpg" alt="img"></div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="box-title"><a href="shop-details.html">French Onion Soup</a></h3>
                                            <p class="box-text">Candied Jerusalem artichokes, truffle</p>
                                        </div>
                                        <div class="right">
                                            <h4 class="price"><span>$</span> 28</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="menu-img-1-2 gsap-scroll-float-up"><img src="assets/img/menu/menu-1-2.jpg" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="gallery-sec-1 space bg-smoke overflow-hidden">
        <div class="container">
            <div class="title-area secTitle-gsap-anim-1 text-center mb-60"><span
                    class="sub-title text-anime-style-1">Our Food Gallery</span>
                <h2 class="sec-title text-anime-style-2">Let’s See our Fast Food <span
                        class="text-theme">Category</span></h2><img class="img-anime-style-1"
                    src="assets/img/icon/title-shape.png" alt="img">
            </div>
            <div class="slider-area">
                <div class="slider-area-wrap" data-mask-src="assets/img/bg/gallery-1-mask.png">
                    <div class="swiper th-slider has-shadow gallery-1-slider" id="gallerySlider1"
                        data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}, "loop":true, "autoHeight": "true"}'>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="gallery-thumb-1"><img src="assets/img/gallery/gallery_1_1.png"
                                        alt="Gallery Image"> <a href="assets/img/gallery/gallery_1_1.png"
                                        class="gallery-btn popup-image"><img src="assets/img/icon/plus-icon.svg"
                                            alt="img"></a></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-thumb-1"><img src="assets/img/gallery/gallery_1_2.png"
                                        alt="Gallery Image"> <a href="assets/img/gallery/gallery_1_2.png"
                                        class="gallery-btn popup-image"><img src="assets/img/icon/plus-icon.svg"
                                            alt="img"></a></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-thumb-1"><img src="assets/img/gallery/gallery_1_3.png"
                                        alt="Gallery Image"> <a href="assets/img/gallery/gallery_1_3.png"
                                        class="gallery-btn popup-image"><img src="assets/img/icon/plus-icon.svg"
                                            alt="img"></a></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-thumb-1"><img src="assets/img/gallery/gallery_1_4.png"
                                        alt="Gallery Image"> <a href="assets/img/gallery/gallery_1_4.png"
                                        class="gallery-btn popup-image"><img src="assets/img/icon/plus-icon.svg"
                                            alt="img"></a></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-thumb-1"><img src="assets/img/gallery/gallery_1_5.png"
                                        alt="Gallery Image"> <a href="assets/img/gallery/gallery_1_5.png"
                                        class="gallery-btn popup-image"><img src="assets/img/icon/plus-icon.svg"
                                            alt="img"></a></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-thumb-1"><img src="assets/img/gallery/gallery_1_3.png"
                                        alt="Gallery Image"> <a href="assets/img/gallery/gallery_1_3.png"
                                        class="gallery-btn popup-image"><img src="assets/img/icon/plus-icon.svg"
                                            alt="img"></a></div>
                            </div>
                        </div>
                    </div>
                </div><button data-slider-prev="#gallerySlider1" class="slider-arrow slider-prev"><img
                        src="assets/img/icon/left-arrow.svg" alt=""></button> <button data-slider-next="#gallerySlider1"
                    class="slider-arrow slider-next"><img src="assets/img/icon/right-arrow.svg" alt=""></button>
            </div>
        </div>
    </div>
    <section class="coming-soon-sec-1 bg-theme3 overflow-hidden"><img class="round-shape-top"
            src="assets/img/shape/shape-top-smoke.png" alt="img">
        <div class="container">
            <div class="row gy-40 align-items-center">
                <div class="col-xl-4 col-lg-4">
                    <div class="coming-left"><img src="assets/img/coming/coming-left-1.png" alt="img"></div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="coming-soon">
                        <h5 class="coming-top-title text-anime-style-2">save up to <span>50%</span> off</h5>
                        <h2 class="coming-middle-title text-anime-style-1"><span>Super</span> Delicious</h2>
                        <h2 class="coming-title text-anime-style-1">Burger</h2>
                        <div class="upcoming-counter-wrap">
                            <p class="box-text wow fadeinleft" data-wow-delay=".3s">Limited Time Offer</p>
                            <ul class="upcoming-counter counter-list" data-offer-date="07/03/2029">
                                <li class="wow fadeinup" data-wow-delay=".4s">
                                    <div class="day count-number">00</div><span class="count-name">Days</span>
                                </li>
                                <li class="wow fadeinup" data-wow-delay=".5s">
                                    <div class="hour count-number">00</div><span class="count-name">Hours</span>
                                </li>
                                <li class="wow fadeinup" data-wow-delay=".6s">
                                    <div class="minute count-number">00</div><span class="count-name">Minutes</span>
                                </li>
                                <li class="wow fadeinup" data-wow-delay=".7s">
                                    <div class="seconds count-number">00</div><span class="count-name">Seconds</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="coming-right wow fadeinright"><img src="assets/img/coming/coming-right.png" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="team-area-1 space-top">
        <div class="container z-index-common">
            <div class="title-area text-center mb-60"><span class="sub-title text-anime-style-1">Our Chefs</span>
                <h2 class="sec-title text-anime-style-2">Meet Our Expert <span class="text-theme">Chef</span></h2><img
                    class="img-anime-style-1" src="assets/img/icon/title-shape.png" alt="img">
            </div>
            <div class="row gy-40 team-1-nth">
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="th-team team-card wow fadeinleft" data-wow-delay=".2s">
                        <div class="img-wrap">
                            <div class="team-img"><img src="assets/img/team/team_1_1.png" alt="Team"> <img
                                    class="team-1-bg-shape" src="assets/img/bg/team-1-bg-shape.png" alt=""></div>
                            <div class="team-social-hover">
                                <div class="th-social"><a target="_blank" href="https://twitter.com/"><i
                                            class="fab fa-twitter"></i></a> <a target="_blank"
                                        href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a> <a
                                        target="_blank" href="https://instagram.com/"><i
                                            class="fab fa-instagram"></i></a> <a target="_blank"
                                        href="https://youtube.com/"><i class="fab fa-youtube"></i></a> <a
                                        target="_blank" href="https://whatsapp.com/"><i class="fab fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-card-content">
                            <h3 class="box-title"><a href="team-details.html">Alina Morish</a></h3><span
                                class="team-desig">Expert Chef</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="th-team team-card wow fadeinleft" data-wow-delay=".4s">
                        <div class="img-wrap">
                            <div class="team-img"><img src="assets/img/team/team_1_2.png" alt="Team"> <img
                                    class="team-1-bg-shape" src="assets/img/bg/team-1-bg-shape.png" alt=""></div>
                            <div class="team-social-hover">
                                <div class="th-social"><a target="_blank" href="https://twitter.com/"><i
                                            class="fab fa-twitter"></i></a> <a target="_blank"
                                        href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a> <a
                                        target="_blank" href="https://instagram.com/"><i
                                            class="fab fa-instagram"></i></a> <a target="_blank"
                                        href="https://youtube.com/"><i class="fab fa-youtube"></i></a> <a
                                        target="_blank" href="https://whatsapp.com/"><i class="fab fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-card-content">
                            <h3 class="box-title"><a href="team-details.html">Michel Clark</a></h3><span
                                class="team-desig">Expert Chef</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="th-team team-card wow fadeinright" data-wow-delay=".6s">
                        <div class="img-wrap">
                            <div class="team-img"><img src="assets/img/team/team_1_3.png" alt="Team"> <img
                                    class="team-1-bg-shape" src="assets/img/bg/team-1-bg-shape.png" alt=""></div>
                            <div class="team-social-hover">
                                <div class="th-social"><a target="_blank" href="https://twitter.com/"><i
                                            class="fab fa-twitter"></i></a> <a target="_blank"
                                        href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a> <a
                                        target="_blank" href="https://instagram.com/"><i
                                            class="fab fa-instagram"></i></a> <a target="_blank"
                                        href="https://youtube.com/"><i class="fab fa-youtube"></i></a> <a
                                        target="_blank" href="https://whatsapp.com/"><i class="fab fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-card-content">
                            <h3 class="box-title"><a href="team-details.html">Esa Elizabed</a></h3><span
                                class="team-desig">Expert Chef</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="th-team team-card wow fadeinright" data-wow-delay=".8s">
                        <div class="img-wrap">
                            <div class="team-img"><img src="assets/img/team/team_1_4.png" alt="Team"> <img
                                    class="team-1-bg-shape" src="assets/img/bg/team-1-bg-shape.png" alt=""></div>
                            <div class="team-social-hover">
                                <div class="th-social"><a target="_blank" href="https://twitter.com/"><i
                                            class="fab fa-twitter"></i></a> <a target="_blank"
                                        href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a> <a
                                        target="_blank" href="https://instagram.com/"><i
                                            class="fab fa-instagram"></i></a> <a target="_blank"
                                        href="https://youtube.com/"><i class="fab fa-youtube"></i></a> <a
                                        target="_blank" href="https://whatsapp.com/"><i class="fab fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-card-content">
                            <h3 class="box-title"><a href="team-details.html">William Latham</a></h3><span
                                class="team-desig">Expert Chef</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="opening-sec-1 space overflow-hidden">
        <div class="container">
            <div class="opening-container-wrap" data-mask-src="assets/img/bg/opening-bg-mask.png">
                <div class="row gy-40 align-items-center">
                    <div class="col-xl-7">
                        <div class="opening-1-thumb" data-mask-src="assets/img/bg/opening-1-mask.png"><img
                                src="assets/img/opening/opening-1-left.jpg" alt="img">
                            <div class="opening-1-video"><a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk"
                                    class="play-btn popup-video"><i class="fa-sharp fa-solid fa-play"></i></a></div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="opening-right">
                            <div class="title-area text-center mb-60"><span class="sub-title text-anime-style-1">Opening
                                    Hours</span>
                                <h2 class="sec-title text-anime-style-2 text-white">Our Opening Hours</h2><img
                                    class="img-anime-style-1" src="assets/img/icon/title-shape2.png" alt="img">
                            </div>
                            <div class="time-table-wrap me-xl-5 wow fadeinup" data-wow-delay=".4s">
                                <div class="item">
                                    <p class="box-text">Monday to Tuesday</p>
                                    <div class="open-time">
                                        <h4 class="box-title">10:00 AM</h4>
                                        <h4 class="box-title">20:00 PM</h4>
                                    </div>
                                </div>
                                <div class="item">
                                    <p class="box-text">Friday to Sunday</p>
                                    <div class="open-time">
                                        <h4 class="box-title">12:00 AM</h4>
                                        <h4 class="box-title">23:00 PM</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom text-center mt-40 wow fadeinup" data-wow-delay=".2s"><a
                                    href="reservation.html" class="th-btn btn-mask style5">Book Your ABLE</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testi-area-1 space-bottom overflow-hidden" id="testi-sec">
        <div class="shape-mockup d-none d-xxl-block jump-reverse" style="top: 2%; left: 0%;"><img
                src="assets/img/icon/hero-1-3.png" alt="img"></div>
        <div class="shape-mockup d-none d-xxl-block jump" style="top: 10%; right: 0%;"><img
                src="assets/img/icon/testi-top-1-1.png" alt="img"></div>
        <div class="shape-mockup d-none d-xxl-block jump" style="bottom: 2%; left: 0%;"><img
                src="assets/img/icon/testi-top-1-2.png" alt="img"></div>
        <div class="container">
            <div class="title-area text-center mb-60"><span class="sub-title text-anime-style-1">Testimonials</span>
                <h2 class="sec-title text-anime-style-2">Our Customers <span class="text-theme">Feedback</span></h2><img
                    class="img-anime-style-1" src="assets/img/icon/title-shape.png" alt="img">
            </div>
            <div class="row gy-40 gx-30">
                <div class="col-xl-6">
                    <div class="testi-1-item wow fadeinleft" data-wow-delay=".3s">
                        <div class="client-thumb"><img src="assets/img/testimonial/testi-1-1.png" alt="img"></div>
                        <div class="content"><img class="testi-1-quote" src="assets/img/icon/testi-1-quote.png"
                                alt="icon">
                            <p class="box-text">“Every pizza starts with our hand-tossed dough, made fresh daily and
                                topped with our signature sauce crafted from ripe tomatoes and secret herbs.”</p>
                        </div>
                        <div class="bottom">
                            <h4 class="box-title">Victoria Wotton</h4>
                            <p>Fementum Odio Co.</p>
                            <div class="th-social"><i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i
                                    class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i
                                    class="fa-solid fa-star"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="testi-1-item wow fadeinright" data-wow-delay=".3s">
                        <div class="client-thumb"><img src="assets/img/testimonial/testi-1-2.png" alt="img"></div>
                        <div class="content"><img class="testi-1-quote" src="assets/img/icon/testi-1-quote.png"
                                alt="icon">
                            <p class="box-text">“Freshly tossed dough forms the base of every pizza, of the name topped
                                with a homemade sauce made from juicy tomatoes and our special herb recipe.”</p>
                        </div>
                        <div class="bottom">
                            <h4 class="box-title">Emma Mia</h4>
                            <p>Fementum Odio Co.</p>
                            <div class="th-social"><i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i
                                    class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i
                                    class="fa-solid fa-star"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="space bg-smoke overflow-hidden" id="blog-sec">
        <div class="shape-mockup d-none d-xxl-block jump-reverse" style="top: 3%; left: 2%;"><img
                src="assets/img/icon/blog-1-1.png" alt="img"></div>
        <div class="shape-mockup d-none d-xxl-block jump" style="top: 3%; right: 2%;"><img
                src="assets/img/icon/blog-1-2.png" alt="img"></div>
        <div class="shape-mockup d-none d-xxl-block jump" style="bottom: 3%; right: 2%;"><img
                src="assets/img/icon/blog-1-3.png" alt="img"></div>
        <div class="container">
            <div class="title-area text-center mb-50"><span class="sub-title text-anime-style-1">News & Blogs</span>
                <h2 class="sec-title text-anime-style-2">Our Latest News & <span class="text-theme">Blogs</span></h2>
                <img class="img-anime-style-1" src="assets/img/icon/title-shape.png" alt="img">
            </div>
            <div class="slider-area">
                <div class="swiper th-slider" id="blogSlider1"
                    data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}, "autoHeight": "true"}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img"><a href="blog-details.html"><img
                                            src="assets/img/blog/blog_1_1.jpg" alt="blog image"></a></div>
                                <div class="blog-content">
                                    <div class="blog-meta"><a class="author" href="blog.html"><i
                                                class="fal fa-user"></i>By Jonson</a> <a href="blog.html"><i
                                                class="fal fa-calendar"></i>12 April, 2025</a></div>
                                    <h3 class="box-title"><a href="blog-details.html">In Fast Food Really Getting
                                            Healthier? What You Need Know</a></h3><a href="blog-details.html"
                                        class="th-btn btn-mask">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img"><a href="blog-details.html"><img
                                            src="assets/img/blog/blog_1_2.jpg" alt="blog image"></a></div>
                                <div class="blog-content">
                                    <div class="blog-meta"><a class="author" href="blog.html"><i
                                                class="fal fa-user"></i>By Jonson</a> <a href="blog.html"><i
                                                class="fal fa-calendar"></i>16 March, 2025</a></div>
                                    <h3 class="box-title"><a href="blog-details.html">Is Fast Food Getting Healthier?
                                            Here’s What We’re Doing</a></h3><a href="blog-details.html"
                                        class="th-btn btn-mask">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img"><a href="blog-details.html"><img
                                            src="assets/img/blog/blog_1_3.jpg" alt="blog image"></a></div>
                                <div class="blog-content">
                                    <div class="blog-meta"><a class="author" href="blog.html"><i
                                                class="fal fa-user"></i>By Jonson</a> <a href="blog.html"><i
                                                class="fal fa-calendar"></i>17 June, 2025</a></div>
                                    <h3 class="box-title"><a href="blog-details.html">Healthy Fast is Food a Myth or
                                            Reality? Heres the Truth</a></h3><a href="blog-details.html"
                                        class="th-btn btn-mask">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img"><a href="blog-details.html"><img
                                            src="assets/img/blog/blog_1_1.jpg" alt="blog image"></a></div>
                                <div class="blog-content">
                                    <div class="blog-meta"><a class="author" href="blog.html"><i
                                                class="fal fa-user"></i>By Jonson</a> <a href="blog.html"><i
                                                class="fal fa-calendar"></i>12 April, 2025</a></div>
                                    <h3 class="box-title"><a href="blog-details.html">In Fast Food Really Getting
                                            Healthier? What You Need Know</a></h3><a href="blog-details.html"
                                        class="th-btn btn-mask">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img"><a href="blog-details.html"><img
                                            src="assets/img/blog/blog_1_2.jpg" alt="blog image"></a></div>
                                <div class="blog-content">
                                    <div class="blog-meta"><a class="author" href="blog.html"><i
                                                class="fal fa-user"></i>By Jonson</a> <a href="blog.html"><i
                                                class="fal fa-calendar"></i>17 June, 2025</a></div>
                                    <h3 class="box-title"><a href="blog-details.html">Is Fast Food Getting Healthier?
                                            Here’s What We’re Doing</a></h3><a href="blog-details.html"
                                        class="th-btn btn-mask">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img"><a href="blog-details.html"><img
                                            src="assets/img/blog/blog_1_3.jpg" alt="blog image"></a></div>
                                <div class="blog-content">
                                    <div class="blog-meta"><a class="author" href="blog.html"><i
                                                class="fal fa-user"></i>By Jonson</a> <a href="blog.html"><i
                                                class="fal fa-calendar"></i>12 April, 2025</a></div>
                                    <h3 class="box-title"><a href="blog-details.html">Healthy Fast is Food a Myth or
                                            Reality? Heres the Truth</a></h3><a href="blog-details.html"
                                        class="th-btn btn-mask">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><button data-slider-prev="#blogSlider1" class="slider-arrow slider-prev"><img
                        src="assets/img/icon/left-arrow.svg" alt=""></button> <button data-slider-next="#blogSlider1"
                    class="slider-arrow slider-next"><img src="assets/img/icon/right-arrow.svg" alt=""></button>
            </div>
        </div>
    </section>
    <section class="cta-area-1 bg-theme4 overflow-hidden">
        <div class="shape-mockup footer-bg-shape1-1 jump d-none d-xl-block" data-left="0" data-top="5%"><img
                src="assets/img/icon/cta-1-top.png" alt="img"></div><img class="round-shape-top"
            src="assets/img/shape/shape-top-smoke.png" alt="img">
        <div class="cta-bg-1-1-wrap">
            <div class="cta-bg-1-1"><img src="assets/img/bg/cta-bg-1-1.png" alt="img"></div>
        </div>
        <div class="cta-1-shape-trangle"></div>
        <div class="cta-round-shape"></div>
        <div class="container z-index-common">
            <div class="row gy-30">
                <div class="col-xl-6 col-lg-6">
                    <div class="cta-wrap1">
                        <div class="title-area me-xl-5 pe-xl-5 mb-0">
                            <h2 class="sec-title text-anime-style-1 text-white">Subscribe to our newsletter & Get 20%
                                Off <span class="text-theme">Fast Food Order</span></h2>
                            <p class="sec-text text-anime-style-2 text-title mt-30 mb-20 fw-medium">Get all latest
                                information on sales and offer</p>
                            <form class="newsletter-form img-anime-style-1">
                                <div class="form-group"><input class="form-control" type="email"
                                        placeholder="Enter your mail address...." required=""></div><button
                                    type="submit" class="th-btn style4 mt-0">SUBSCRIBE</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 align-self-end">
                    <div class="cta-thumb1-1 text-center text-lg-end tilt-active wow fadeiright"><img
                            src="assets/img/cta/cta-1-img.png" alt="img"></div>
                </div>
            </div>
        </div>
    </section>
@endsection