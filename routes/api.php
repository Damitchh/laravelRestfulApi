<?php

use App\Http\Controllers\BestProductController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PesanansController;
use App\Http\Controllers\ProductsController;
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

Route::get('/bestproducts', [BestProductController::class, 'index']);
Route::get('/bestproducts/{id}', [BestProductController::class, 'show']);
Route::post('/bestproducts', [BestProductController::class, 'store']);
Route::put('/bestproducts/{id}', [BestProductController::class, 'update']);
Route::delete('/bestproducts/{id}', [BestProductController::class, 'destroy']);

Route::get('/keranjangs', [KeranjangController::class, 'index']);
Route::get('/keranjangs/{id}', [KeranjangController::class, 'show']);
Route::post('/keranjangs', [KeranjangController::class, 'store']);
Route::put('/keranjangs/{id}', [KeranjangController::class, 'update']);
Route::delete('/keranjangs{id}', [KeranjangController::class, 'destroy']);

Route::get('/products', [KeranjangController::class, 'index']);
Route::get('/products/{id}', [KeranjangController::class, 'show']);
Route::post('/products', [KeranjangController::class, 'store']);
Route::put('/products/{id}', [KeranjangController::class, 'update']);
Route::delete('/products{id}', [KeranjangController::class, 'destroy']);

Route::get('/keranjangs', [ProductsController::class, 'index']);
Route::get('/keranjangs/{id}', [ProductsController::class, 'show']);
Route::post('/keranjangs', [ProductsController::class, 'store']);
Route::put('/keranjangs/{id}', [ProductsController::class, 'update']);
Route::delete('/keranjangs{id}', [ProductsController::class, 'destroy']);


Route::get('/keranjangs', [ProductsController::class, 'index']);
Route::get('/keranjangs/{id}', [ProductsController::class, 'show']);
Route::post('/keranjangs', [ProductsController::class, 'store']);
Route::put('/keranjangs/{id}', [ProductsController::class, 'update']);
Route::delete('/keranjangs{id}', [ProductsController::class, 'destroy']);


Route::get('/pesanans', [PesanansController::class, 'index']);
Route::get('/pesanans/{id}', [PesanansController::class, 'show']);
Route::post('/pesanans', [PesanansController::class, 'store']);
Route::put('/pesanans/{id}', [PesanansController::class, 'update']);
Route::delete('/pesanans{id}', [PesanansController::class, 'destroy']);

// Route::resource('/bestproducts', [BestProductController::class])->except (['create','edit']);