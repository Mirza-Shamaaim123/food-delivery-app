<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\StripeWebhookController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('frontend.index')->name('index');
// });
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware('auth')->name('home.dashboard');
Route::get('/profile', [HomeController::class, 'profile'])->middleware('auth')->name('user.profile');
Route::post('/profile/update', [HomeController::class, 'update'])->name('profile.update');

Route::get('/order', [HomeController::class, 'order'])->middleware('auth')->name('user.order');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/blog', [HomeController::class, 'blog'])->name('home.blog');
Route::get('/shop', [FrontendController::class, 'shop'])->name('frontend.shop');
Route::get('/shop/details/{id}', [FrontendController::class, 'details'])->name('frontend.shop.details');
Route::get('/cart', [FrontendController::class, 'cart'])->name('frontend.cart');
Route::post('/add-to-cart/{id}', [FrontendController::class, 'addToCart'])->name('frontend.addToCart');
Route::post('/update-cart/{id}', [FrontendController::class, 'updateCart'])->name('frontend.updateCart');
Route::get('/remove-from-cart/{id}', [FrontendController::class, 'removeFromCart'])->name('frontend.removeFromCart');
Route::post('/apply-coupon', [FrontendController::class, 'applyCoupon'])->name('frontend.applyCoupon');
Route::post('/billing-details', [FrontendController::class, 'store'])->name('checkout.store')->middleware('auth');
// routes/web.php
Route::post('/order/update-status', [FrontendController::class, 'updateStatus']);

// Route::post('/place-order', [FrontendController::class, 'store'])->name('order.store');
// Route::get('/stripe-success', [StripeController::class, 'success'])->name('stripe.success');




Route::get('/checkout', [FrontendController::class, 'checkout'])->name('frontend.checkout');
Route::post('/checkout/session', [StripeController::class, 'createCheckoutSession'])->name('checkout.session');
Route::post('/stripe/payment', [StripeController::class, 'payment'])->name('stripe.payment');
Route::get('/success', [FrontendController::class, 'success'])->name('stripe.success');
// web.php
Route::get('/order/success/{order}', [FrontendController::class, 'success'])->name('order.success');

Route::get('/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');
// web.php
Route::post('/create-payment-intent', [FrontendController::class, 'createPaymentIntent']);






Route::get('/account/register', [AccountController::class, 'registration'])->name('account.register');
Route::post('/account/process-register', [AccountController::class, 'processRegistration'])->name('account.processRegistration');
Route::post('/account/authenticate', [AccountController::class, 'authenticate'])->name('account.authenticate');
Route::get('/account/login', [AccountController::class, 'login'])->name('account.login');

//              Category view in frontend
Route::get('/home', [FrontendController::class, 'index'])->name('frontend.index');
            //      ADMIN ROUTES
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware([ 'admin_check']);
            //    ADMIN  CATEGORY ROUTES
Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.categorylist')->middleware([ 'admin_check']);
Route::get('/admin/category/add', [CategoryController::class, 'add'])->name('admin.categoryadd')->middleware([ 'admin_check']);
Route::post('/add-category', [CategoryController::class, 'store'])->name('admin.category.store')->middleware([ 'admin_check']);
Route::get('/admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::post('/admin/category/{id}/update', [CategoryController::class, 'updatecategory'])->name('admin.category.update');
Route::delete('/admin/category/{id}/delete', [CategoryController::class, 'destroy'])->name('admin.category.delete');
Route::get('/admin/category/{id}/view', [CategoryController::class, 'view'])->name('admin.category.view');
                //    ADMIN  PRODUCT ROUTES
Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.productlist')->middleware([ 'admin_check']);
Route::post('/admin/product', [ProductController::class, 'store'])->name('admin.product.store')->middleware([ 'admin_check']);
Route::put('/admin/product/{id}', [ProductController::class, 'update'])->name('admin.product.update')->middleware([ 'admin_check']);
Route::delete('/admin/product/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete')->middleware([ 'admin_check']);
//                //    ADMIN  TAG ROUTES
Route::get('/admin/tag', [TagController::class, 'index'])->name('admin.tag')->middleware([ 'admin_check']);
Route::post('/admin/tag', [TagController::class, 'store'])->name('admin.tag.store')->middleware([ 'admin_check']);
Route::put('/admin/tag/{id}', [TagController::class, 'update'])->name('admin.tag.update')->middleware([ 'admin_check']);
Route::delete('/admin/tag/{id}', [TagController::class, 'destroy'])->name('admin.tag.delete')->middleware([ 'admin_check']);
//                      ADMIN BLOG ROUTES
Route::get('/admin/blog', [BlogController::class, 'index'])->name('admin.blog')->middleware([ 'admin_check']);
Route::post('/admin/blogs/store', [BlogController::class, 'store'])->name('blogs.store')->middleware([ 'admin_check']);
Route::put('/admin/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update')->middleware([ 'admin_check']);
Route::delete('/admin/blogs/{id}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');

//              Coupon Routes
Route::get('/admin/coupons', [CouponController::class, 'index'])->name('admin.coupons')->middleware([ 'admin_check']);
Route::post('/admin/coupons', [CouponController::class, 'store'])->name('admin.coupons.store')->middleware([ 'admin_check']);
Route::put('/admin/coupons/{id}', [CouponController::class, 'update'])->name('admin.coupons.update')->middleware([ 'admin_check']);
// Route::delete('/admin/coupons/{id}', [CouponController::class, 'destroy'])->name('admin.coupons.destroy')->middleware([ 'admin_check']);
Route::delete('/admin/coupons/{id}', [CouponController::class, 'destroy'])->name('admin.coupons.destroy')->middleware(['admin_check']);

//              Review Routes
Route::get('/admin/review', [ReviewController::class, 'index'])->name('admin.review')->middleware([ 'admin_check']);
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
Route::post('/admin/review/status/{id}', [ReviewController::class, 'updateStatus'])->name('admin.review.status')->middleware('admin_check');

