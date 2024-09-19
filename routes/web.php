<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





require __DIR__ . '/auth.php';



Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/Profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/Profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');


    //admin customer list

    Route::get('/customer-list', [AdminController::class, 'admincustomerlist'])->name('admin.customer.list'); 

    //admin categorye list

    Route::get('/category-list', [AdminController::class, 'admincategorylist'])->name('admin.category.list');

    Route::get('/add-category', [AdminController::class, 'adminaddcategory'])->name('admin.add.category');

    Route::get('/edit-category', [AdminController::class, 'admineditcategory'])->name('admin.edit.category');

    //admin Product list

    Route::get('/product-list', [AdminController::class, 'adminproductlist'])->name('admin.product.list');

    Route::get('/add-product', [AdminController::class, 'adminaddproduct'])->name('admin.add.product');

    Route::get('/edit-product', [AdminController::class, 'admineditproduct'])->name('admin.edit.product');


});


Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');