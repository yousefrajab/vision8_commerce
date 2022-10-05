<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProducttController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[AuthController::class , 'login']);
Route::post('/register',[AuthController::class , 'register']);

route::prefix('v1')->middleware('auth:sanctum')->group(function(){

route::apiResource('products',ProducttController::class);

});
// route::get('products',function(){

// return 'aaa';

// });
