<?php

use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\VerificationController;
use App\Http\Controllers\ProductController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/create-product', [ProductController::class, 'create']);
Route::get('/products', [ProductController::class, 'getALl']);
Route::get('/product', [ProductController::class, 'getById']);
Route::post('/edit-product', [ProductController::class, 'edit']);
Route::delete('/delete-product', [ProductController::class, 'destroy']);
Route::get('/test', [ProductController::class, 'test']);
Route::post('/buy-product', [ProductController::class, 'buy']);
Route::get('/verify', [VerificationController::class, 'verify']);
Route::post('/register', [RegisterController::class, 'register'])->name('verification.verify');;
