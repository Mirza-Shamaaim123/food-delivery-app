<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('frontend.index')->name('index');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
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