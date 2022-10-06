<?php

use App\Mail\InvoiceMail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SiteController;
use App\Notifications\NewOrderNotification;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DropZoneController;
use App\Http\Controllers\admin\rolecontroller;
use App\Http\Controllers\ApiController;
use App\Models\Order;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::prefix(LaravelLocalization::setLocale())->group(function () {
    Route::prefix('admin')->name('admin.')->middleware('auth', 'user_type', 'verified')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        route::resource('categories', CategoryController::class);
        route::resource('products', ProductController::class);
        Route::get('roles/trash', [rolecontroller::class, 'trash'])->name('roles.trash');
        Route::get('roles/{id}/forcedelete', [rolecontroller::class, 'forcedelete'])->name('roles.forcedelete');
        Route::get('roles/{id}/restore', [rolecontroller::class, 'restore'])->name('roles.restore');
        route::resource('roles', rolecontroller::class);


        // route::delete('roles/{id}/destroy', [rolecontroller::class, 'destroy'])->name('roles.destroy');

        Route::get('
         delete-image/{id}', [ProductController::class, 'delete_image'])->name('products.delete_image');
        route::get('users', [UserController::class, 'index'])->name('users.index');
        route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });
    Auth::routes(['verify' => true]);

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::view('no-access', 'no_access');

    route::get('/', [SiteController::class, 'index'])->name('site.index');
    route::get('/about', [SiteController::class, 'about'])->name('site.about');
    route::get('/shop', [SiteController::class, 'shop'])->name('site.shop');
    route::get('/contact', [SiteController::class, 'contact'])->name('site.contact');
    route::get('/category/{id}', [SiteController::class, 'category'])->name('site.category');
    route::get('/search', [SiteController::class, 'search'])->name('site.search');
    route::get('/product/{slug}', [SiteController::class, 'product'])->name('site.product');
    route::post('/product/{slug}/review', [SiteController::class, 'product_review'])->name('site.product_review');
    route::post('/add-to-cart', [CartController::class, 'add_to_cart'])->name('site.add_to_cart');

    Route::get('/cart', [CartController::class, 'cart'])->name('site.cart')->middleware('auth');

    Route::post('/update-cart', [CartController::class, 'update_cart'])->name('site.update_cart')->middleware('auth');

    Route::get('/cart/{id}', [CartController::class, 'remove_cart'])->name('site.remove_cart')->middleware('auth');

    Route::get('/checkout', [CartController::class, 'checkout'])->name('site.checkout')->middleware('auth');
    Route::get('/payment', [CartController::class, 'payment'])->name('site.payment')->middleware('auth');
    Route::get('/payment/success', [CartController::class, 'success'])->name('site.success')->middleware('auth');
    Route::get('/payment/fail', [CartController::class, 'fail'])->name('site.fail')->middleware('auth');

});

Route::get('posts-api',[ApiController::class ,'posts']);


include 'test.php';



//dropzone
Route::get('/dropzone', [DropZoneController::class, 'dropzone']);
Route::post('/dropzone-store', [DropZoneController::class, 'dropzoneStore'])->name('dropzone.store');

//sitroutes
