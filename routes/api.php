<?php

use App\Http\Controllers\Api\BusinessController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\AuthController;
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
    Route::post('/add_admin_category', [CategoryController::class, 'add_admin_category']);

    //product api
    Route::post('/getProducts', [ProductController::class, 'index']);
    Route::post('/addproduct', [ProductController::class, 'store']);
    Route::post('/updateproduct', [ProductController::class, 'edit']);
    Route::post('/product_by_category', [ProductController::class, 'productByCategory']);
    Route::post('/product_by_sub_category', [ProductController::class, 'productBySubCategory']);
    Route::post('/getproductdetail', [ProductController::class, 'getProductDetail']);
    Route::post('/deleteproduct', [ProductController::class, 'destroy']);
    Route::post('/addadminproduct', [ProductController::class, 'addadminproduct']);
    Route::post('/productStatus', [ProductController::class, 'productStatus']);

    //order Api
    Route::post('/get_my_orders', [OrderController::class, 'index']);
    Route::post('/create_order', [OrderController::class, 'store']);
    Route::post('/update_order', [OrderController::class, 'edit']);
    Route::post('/cancel_order', [OrderController::class, 'cancel']);
    Route::post('/delivery_settings', [OrderController::class, 'deliverysettings']);
    Route::post('/showDelivery', [OrderController::class, 'showDelivery']);

    //store api
    Route::post('/update_store', [StoreController::class, 'edit']);
    Route::post('/update_store_status', [StoreController::class, 'status']);

    Route::post('/checkout_control', [StoreController::class, 'checkoutController']);
    Route::post('/getUserPolicies', [StoreController::class, 'getUserPolicies']);
    Route::post('/feedback', [StoreController::class, 'Feedback']);
    Route::post('/showPayControl', [StoreController::class, 'showPay']);
    Route::post('/userProfile', [StoreController::class, 'userProfile']);

    //offer
    Route::post('/create_coupon', [OfferController::class, 'createCoupon']);
    Route::post('/getCoupons', [OfferController::class, 'showCoupon']);
    Route::post('/updateCoupons', [OfferController::class, 'updateCoupon']);
    Route::post('/deleteCoupon', [OfferController::class, 'deleteCoupon']);
    Route::post('/deleteBanner', [OfferController::class, 'deleteBanner']);
    Route::post('/create_banner', [OfferController::class, 'createBanner']);
    Route::post('/showbanners', [OfferController::class, 'showBanner']);
    Route::post('/updateBanner', [OfferController::class, 'updateBanner']);

    //logout
    Route::post('logout', [AuthController::class, 'logout']);

    //Business
    Route::post('addInfo', [BusinessController::class, 'addSocial']);
    Route::post('kyc', [BusinessController::class, 'Kyc']);
    Route::post('contact', [BusinessController::class, 'Contact']);
});

//store api
Route::post('/search_store', [StoreController::class, 'searchStore']);
Route::post('/store_detail', [StoreController::class, 'storeDetail']);

//user cart system

Route::group(['middleware' => ['cart']], function () {
    Route::post('/cart', [CartController::class, 'index']);
    Route::post('/increasecart', [CartController::class, 'increaseCart']);
    Route::post('/decreasecart', [CartController::class, 'decreaseCart']);
});
Route::get('/error', function () {
    echo 'Error Occured';
});