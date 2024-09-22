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

    Route::post('/categories-store', [AdminController::class, 'admincategorystoer'])->name('admin.category.store');

    Route::get('/edit-category/{id}', [AdminController::class, 'admineditcategory'])->name('admin.edit.category');

    Route::put('/update-category/{id}', [AdminController::class, 'adminupdatecategory'])->name('admin.update.category');

    Route::delete('delete-category/{id}', [AdminController::class, 'admindeletecategory'])->name('admin.delete.category');






    //admin Product list

    Route::get('/product-list', [AdminController::class, 'adminproductlist'])->name('admin.product.list');

    Route::get('/add-product', [AdminController::class, 'adminaddproduct'])->name('admin.add.product');

    Route::get('/edit-product/{id}', [AdminController::class, 'admineditproduct'])->name('admin.edit.product');

    Route::post('/product/store', [AdminController::class, 'adminproductstoer'])->name('admin.product.store');

    Route::put('/product/update/{id}', [AdminController::class, 'adminupdateproduct'])->name('admin.update.product');

    Route::delete('/delete-product/{id}', [AdminController::class, 'admindeleteproduct'])->name('admin.delete.product');

    Route::get('/view-product/{id}', [AdminController::class, 'adminviewproduct'])->name('admin.product.view');

});


Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');