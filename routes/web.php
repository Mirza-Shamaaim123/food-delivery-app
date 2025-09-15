<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('frontend.index')->name('index');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/account/register', [AccountController::class, 'registration'])->name('account.register');
Route::post('/account/process-register', [AccountController::class, 'processRegistration'])->name('account.processRegistration');
Route::post('/account/authenticate', [AccountController::class, 'authenticate'])->name('account.authenticate');
Route::get('/account/login', [AccountController::class, 'login'])->name('account.login');
//              Category view in frontend
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
            //      ADMIN ROUTES
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware([ 'admin_check']);
            //      CATEGORY ROUTES
Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.categorylist')->middleware([ 'admin_check']);
Route::get('/admin/category/add', [CategoryController::class, 'add'])->name('admin.categoryadd')->middleware([ 'admin_check']);
Route::post('/add-category', [CategoryController::class, 'store'])->name('admin.category.store')->middleware([ 'admin_check']);
Route::get('/admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::post('/admin/category/{id}/update', [CategoryController::class, 'updatecategory'])->name('admin.category.update');
Route::delete('/admin/category/{id}/delete', [CategoryController::class, 'destroy'])->name('admin.category.delete');
Route::get('/admin/category/{id}/view', [CategoryController::class, 'view'])->name('admin.category.view');

