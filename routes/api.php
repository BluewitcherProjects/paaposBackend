<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\StoreController;




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

use Illuminate\Support\Facades\Route;

Route::post('/signup', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/verifyotp', [AuthController::class, 'otpverify']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/userDetail', [AuthController::class, 'me']);
    Route::post('/addBank', [AuthController::class, 'bankDetail']);
    Route::post('/addBusiness', [AuthController::class, 'businessDetail']);

    //category api
    Route::post('/getCategories', [CategoryController::class, 'index']);
    Route::post('/addcategory', [CategoryController::class, 'store']);
    Route::post('/getSubCategories', [CategoryController::class, 'subindex']);
    Route::post('/addsubcategory', [CategoryController::class, 'storeSubCategory']);


    //product api
    Route::post('/getProducts', [ProductController::class, 'index']);
    Route::post('/addproduct', [ProductController::class, 'store']);
    Route::post('/updateproduct', [ProductController::class, 'edit']);
    Route::post('/product_by_category', [ProductController::class, 'productByCategory']);
    Route::post('/product_by_sub_category', [ProductController::class, 'productBySubCategory']);
    Route::post('/getproductdetail', [ProductController::class, 'getProductDetail']);
    Route::post('/productStatus', [ProductController::class, 'productStatus']);
    Route::post('/deleteproduct', [ProductController::class, 'destroy']);
    Route::post('/addadminproduct', [ProductController::class, 'addadminproduct']);


    //order Api
    Route::post('/get_my_orders', [OrderController::class, 'index']);
    Route::post('/create_order', [OrderController::class, 'store']);
    Route::post('/update_order', [OrderController::class, 'edit']);
    Route::post('/cancel_order', [OrderController::class, 'cancel']);


    //store status
    Route::post('/update_store', [StoreController::class, 'edit']);
    Route::post('/update_store_status', [StoreController::class, 'status']);








    //logout
    Route::post('logout', [AuthController::class, 'logout']);
});
