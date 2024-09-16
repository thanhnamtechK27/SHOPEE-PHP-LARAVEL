<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogFEController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthController;



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

//Blog:
Route::get('/blog', [BlogFEController::class, 'blog_list']);
Route::get('/product', [ProductController::class, 'product_list']);

// Product:
Route::get('/product/{id}', [ProductController::class, 'product_detail']);



