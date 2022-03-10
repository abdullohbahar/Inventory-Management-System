<?php

use App\Http\Controllers\Api\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ExpenseController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SallaryController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\PointOfSaleController;
use App\Http\Controllers\Api\SupplierController;

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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signup']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::apiResource('/employee', EmployeeController::class);
Route::apiResource('/supplier', SupplierController::class);
Route::apiResource('/category', CategoryController::class);
Route::apiResource('/product', ProductController::class);
Route::apiResource('/expense', ExpenseController::class);
Route::apiResource('/customer', CustomerController::class);

Route::post('/sallary/paid/{id}', [SallaryController::class, 'paid']);
Route::get('/sallary', [SallaryController::class, 'allSallary']);
Route::get('/sallary/view/{id}', [SallaryController::class, 'viewSallary']);
Route::get('/edit/sallary/{id}', [SallaryController::class, 'editSallary']);
Route::post('/sallary/update/{id}', [SallaryController::class, 'updateSallary']);

Route::get('/get/product/{id}', [PointOfSaleController::class, 'getProduct']);

// Add To Cart
Route::get('/addToCart/{id}', [CartController::class, 'AddToCart']);
Route::get('/cart/product', [CartController::class, 'CartProduct']);
Route::get('/remove/cart/{id}', [CartController::class, 'removeCart']);
Route::get('/increment/{id}', [CartController::class, 'increment']);
Route::get('/decrement/{id}', [CartController::class, 'decrement']);

// Vat
Route::get('/vats', [CartController::class, 'vat']);
