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
                <div class="col-xxl-9 col-lg-8 ">
                    <div class="hello" style="margin-left:50px;">
                        @foreach ($blogs as $blog)
                            <div class="th-blog blog-single has-post-thumbnail">
                                <!-- 🖼 Blog Image -->
                                <div class="blog-img" style="overflow:hidden;  border-radius:10px;">
                                    <a href="#">
                                        @if ($blog->image)
                                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                                                style="width:100%; height:600px; object-fit:cover; border-radius:10px;">
                                        @else
                                            <img src="{{ asset('assets/img/blog/default.jpg') }}" alt="No Image Available"
                                                style="width:100%; height:300px; object-fit:cover; border-radius:10px;">
                                        @endif
                                    </a>
                                </div>

                                <!-- ✍️ Blog Content -->

                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <a class="author" href="#">
                                            <i class="fal fa-user"></i> By Admin
                                        </a>
                                        <a href="#">
                                            <i class="fal fa-calendar-days"></i>
                                            {{ $blog->created_at->format('d M, Y') }}
                                        </a>
                                    </div>

                                    <h2 class="blog-title">
                                        <a href="#">{{ $blog->title }}</a>
                                    </h2>

                                    <p class="blog-text">
                                        {!! $blog->content !!}
                                    </p>

                                    <a href="#" class="th-btn btn-mask btn-sm style2">
                                        READ MORE
                                    </a>
                                </div>
                            </div>
                        @endforeach




                        <div class="th-pagination">
                            <ul>
                                <li><a href="blog.html"><i class="fas fa-arrow-left"></i></a></li>
                                <li><a href="blog.html">1</a></li>
                                <li><a href="blog.html">2</a></li>
                                <li><a href="blog.html"><i class="fas fa-arrow-right"></i></a></li>
                            </ul>
                        </div>
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
                                @foreach ($categories as $cat)
                                    <li>
                                        <a href="#">
                                            {{ $cat->name }}
                                        </a>
                                        <span>{{ $cat->blogs()->count() }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <h3 class="widget_title">Recent Posts</h3>
                            <div class="recent-post-wrap">
                                @foreach ($recentBlogs as $blog)
                                    <div class="recent-post">
                                        <div class="media-img">
                                            <a href="#">
                                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="post-title">
                                                <a class="text-inherit"
                                                    href="#">{{ $blog->title }}</a>
                                            </h4>
                                            <div class="recent-post-meta">
                                                <a href="#">
                                                    <i
                                                        class="far fa-calendar"></i>{{ $blog->created_at->format('d M, Y') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="widget widget_tag_cloud">
                            <h3 class="widget_title">Popular Tags</h3>
                            <div class="tagcloud"><a href="blog.html">Fast Foods</a> <a href="blog.html">Lunch</a> <a
                                    href="blog.html">Restaurant</a> <a href="blog.html">Burger</a> <a
                                    href="blog.html">Dinner</a> <a href="blog.html">Chicken</a></div>
                        </div>
                        <div class="widget widget_banner"
                            data-bg-src="{{ asset('assets/img/widget/sidebar-banner.jpg') }}">
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
