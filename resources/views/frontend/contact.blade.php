@extends('frontend.layout.main')
@section('content')
      <div class="breadcumb-wrapper overflow-hidden" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcumb-content">
                        <h1 class="breadcumb-title">Contact us</h1>
                        <ul class="breadcumb-menu">
                            <li><a href="index.html">Home</a></li>
                            <li>Contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space contact-area-3">
        <div class="container">
            <div class="row gy-40 gx-80 align-items-center">
                <div class="col-xl-6">
                    <div class="contact-info-wrap">
                        <div class="shape-mockup d-xxl-block d-none" data-top="20%" data-left="78%"><img
                                src="assets/img/icon/contact-info-icon.png" alt="img"></div>
                        <div class="mb-30">
                            <h2 class="sec-title text-anime-style-2 mb-2">Contact <span
                                    class="text-theme">Information</span></h2>
                            <p class="box-text">Relax and enjoy your food in our cozy restaurant, or take it to-go.
                                Great taste, great service — every visit is a flavorful experience worth coming back
                                for.</p>
                        </div>
                        <div class="contact-feature-wrap">
                            <div class="contact-feature2">
                                <div class="box-icon"><img src="assets/img/icon/contact-map.svg" alt=""></div>
                                <div class="media-body">
                                    <p class="contact-feature_label">Address</p><a href="https://www.google.com/maps"
                                        class="contact-feature_link">8502 Preston Rd. Inglewood, Maine 98380</a>
                                </div>
                            </div>
                            <div class="contact-feature2">
                                <div class="box-icon"><img src="assets/img/icon/team_call.svg" alt=""></div>
                                <div class="media-body">
                                    <p class="contact-feature_label">Contact Info</p><a href="tel:256654798749"
                                        class="contact-feature_link">Mobile: + +256-6547-98749</a> <a
                                        href="mailto:info@barab.com" class="contact-feature_link">Email:
                                        info@barab.com</a>
                                </div>
                            </div>
                            <div class="contact-feature2">
                                <div class="box-icon"><img src="assets/img/icon/contact-map.svg" alt=""></div>
                                <div class="media-body">
                                    <p class="contact-feature_label">Opening Hours</p><span
                                        class="contact-feature_link">Monday - Saturday: 9:00am - 18:00pm</span> <span
                                        class="contact-feature_link">Sunday are Closed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="contact-form-v2 contact-page-form">
                        <h2 class="title mt-n3 fw-semibold mb-30">Get In Touch!</h2>
                        <form action="https://html.themehour.net/barab/demo/mail.php" method="POST"
                            class="contact-form ajax-contact">
                            <div class="row">
                                <div class="form-group col-md-6"><input type="text" class="form-control" name="name"
                                        id="name" placeholder="Your Name"> <i class="fal fa-user"></i></div>
                                <div class="form-group col-md-6"><input type="email" class="form-control" name="email"
                                        id="email" placeholder="Your Email"> <i class="fal fa-envelope"></i></div>
                                <div class="form-group col-md-12 style-border"><select name="subject" id="subject"
                                        class="form-select">
                                        <option value="" disabled="disabled" selected="selected" hidden>Select Service
                                        </option>
                                        <option value="Personal Training">Personal Training</option>
                                        <option value="Gym & Fitness Training">Gym & Fitness Training</option>
                                        <option value="Basic Yoga">Basic Yoga</option>
                                        <option value="Muscle Building">Muscle Building</option>
                                    </select></div>
                                <div class="col-12 form-group"><textarea placeholder="Write Message...."
                                        class="form-control"></textarea> <i class="fal fa-pencil"></i></div>
                                <div class="form-btn col-12"><button class="th-btn style2 style-radius">SEND MESSAGE
                                        NOW</button></div>
                            </div>
                            <p class="form-messages mb-0 mt-3"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="restaurant-location-sec-1 overflow-hidden" id="restaurant-location-sec">
        <div class="shape-mockup d-none d-xxl-block jump-reverse" style="top: 26%; left: 3%;"><img
                src="assets/img/shape/location-left.png" alt="img"></div>
        <div class="shape-mockup d-none d-xxl-block jump-reverse" style="bottom: 10%; left: 40%;"><img
                src="assets/img/shape/location-right.png" alt="img"></div>
        <div class="container">
            <div class="row gy-4 justify-content-center">
                <div class="col-xl-6">
                    <div class="title-area location-content"><span
                            class="sub-title style-2 text-anime-style-1">Restaurant Location</span>
                        <h2 class="sec-title text-anime-style-2">Visit Our restaurant</h2>
                        <p class="box-text pe-xxl-5 ps-xxl-5 text-anime-style-3">213 W Tomichi Ave, Gunnison, CO 81230,
                            United States</p>
                        <div class="line"></div>
                        <div class="opening ow fadeinup" data-wow-delay=".3s">
                            <p>Monday -Saturdy: 6:00pm – 10:00pm</p>
                            <p>Sunday: is the holyday</p>
                        </div>
                        <div class="th-social ow fadeinup" data-wow-delay=".5s"><a href="https://www.facebook.com/"><i
                                    class="fab fa-facebook-f"></i></a> <a href="https://www.twitter.com/"><i
                                    class="fab fa-twitter"></i></a> <a href="https://www.linkedin.com/"><i
                                    class="fab fa-linkedin-in"></i></a> <a href="https://www.whatsapp.com/"><i
                                    class="fab fa-whatsapp"></i></a></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="map-location"><iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3644.7310056272386!2d89.2286059153658!3d24.00527418490799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe9b97badc6151%3A0x30b048c9fb2129bc!2sAngfuztheme!5e0!3m2!1sen!2sbd!4v1651028958211!5m2!1sen!2sbd"
                            allowfullscreen="" loading="lazy"></iframe></div>
                </div>
            </div>
        </div>
    </section>
@endsection