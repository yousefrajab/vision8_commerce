<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DropZoneController;
use App\Http\Controllers\Admin\ProductController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


    Route::prefix(LaravelLocalization::setLocale())->group(function(){
	Route::prefix('admin')->name('admin.')->middleware('auth' ,'user_type' ,'verified')->group(function() {
        Route::get('/',[AdminController::class , 'index'])->name ('index');
         route::resource('categories',CategoryController::class );
         route::resource('products',ProductController::class );



    });
    });

Auth::routes(['verify'=> true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('no-access','no_access');


//sitroutes

route::get('/',function(){
    return 'home';
})->name('site.index');

//dropzone
Route::get('/dropzone',[DropZoneController::class,'dropzone']);
Route::post('/dropzone-store',[DropZoneController::class,'dropzoneStore'])->name('dropzone.store');

