<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\OwnerController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\VisitorController;
use App\Http\Controllers\owner\Orders;
use App\Http\Controllers\owner\Owner;
use App\Http\Controllers\owner\ProductsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\users\CategoryUserController;
use App\Http\Controllers\users\ProductUserController;

use App\Http\Controllers\Shop\ProductShowController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!





|
*/
//managing subdomain routes

Route::domain('{subdomain}.'.config('app.short_url'))->group(function () {
    Route::get('/', 'App\Http\Controllers\Shop\ProductShowController@index')->name('products.index');
    Route::get('product/{id}', 'App\Http\Controllers\Shop\ProductShowController@show');
});


//end subdomain routes


Route::get('/logins', function () {
    return response([
        'message' => 'Please provide token.'
    ], 404);
})->name('login');

Route::get('login', function () {
    return view('auth.login');
});
Route::get('admin', function () {
    return view('auth.login');
});
Route::get('/', function () {
    return "Comming soon";
});
Route::get('/Owner', function () {
    return view('/Owner.dashboard');
});
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/admin', function () {
        return view('/admin.dashboard');
    });

    //Product Management Routes
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/viewproduct/{id}', [ProductController::class, 'view'])->name('viewproduct');
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('deleteproduct');
    Route::get('editproduct/deleteimage/{id}', [ProductController::class, 'deleteimage'])->name('deleteimage');
    Route::get('/verify/{id}', [ProductController::class, 'verify'])->name('verify');
    Route::get('/addproduct', [ProductController::class, 'add'])->name('addproduct');
    Route::get('/getSubCat', [ProductController::class, 'getSubCat'])->name('getSubCat');
    Route::get('/editproduct/{id}', [ProductController::class, 'edit'])->name('editproduct');
    Route::post('/addproduct', [ProductController::class, 'addproduct'])->name('addproduct');
    Route::post('/updateproduct', [ProductController::class, 'updateproduct'])->name('updateproduct');
    Route::get('productsearch',[ProductController::class, 'productsearch'])->name('productsearch');
    Route::get('profile-export', [ProductController::class, 'fileExport'])->name('profile-export');
    Route::get('/products/pdf', [ProductController::class, 'ProductCreatePDF'])->name('products-pdf');

    // User Managment 
    Route::get('/user', [UserController::class, 'index'])->name('user'); 
    Route::get('/viewuser/{id}', [UserController::class, 'view'])->name('viewuser');
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('deleteuser');
    Route::get('/adduser', [ProductController::class, 'add'])->name('adduser');
     // Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/edituser/{id}', [UserController::class, 'edit'])->name('edituser');
   Route::post('/updateuser/{id}/edit', [UserController::class, 'editUserData'])->name('updateuser');
   Route::get('search',[UserController::class, 'search'])->name('search');
   Route::get('/statusupdate/{id}', [UserController::class, 'statusUpdate'])->name('statusupdate');
   Route::get('file-export', [UserController::class, 'fileExport'])->name('file-export');
   Route::get('/user/pdf', [UserController::class, 'userCreatePDF'])->name('users-pdf');

   //Admin Profile 
   Route::get('/profile', [UserController::class, 'profile'])->name('profilebyId');
   Route::post('/updateprofile/{id}/edit', [UserController::class, 'profilEdit'])->name('editprofile');

   // Admin Forget Password
    Route::get('/forgetpassword', [UserController::class, 'forgetPassword'])->name('forgetpassword');
   Route::post('/forgetpasswords', [UserController::class, 'forgetAdminPassword'])->name('forgetpasswords');

    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/addcategory', [CategoryController::class, 'add'])->name('addcategory');
    Route::get('editcategory/{id}', [CategoryController::class, 'edit'])->name('editcategory');
    Route::post('/createcategory', [CategoryController::class, 'create'])->name('addcategory');
    Route::get('/category/{id}/delete', [CategoryController::class, 'delete'])->name('deletecategory');
    Route::post('/category/{id}/edit', [CategoryController::class, 'editcategory'])->name('editcategorybyid');
   Route::get('catsearch',[CategoryController::class, 'catsearch'])->name('catsearch');
   Route::get('category-file-export', [CategoryController::class, 'fileExport'])->name('category-file-export');
   Route::get('/category/pdf', [CategoryController::class, 'CategoryCreatePDF'])->name('categorys-pdf');
    
    Route::get('/subcategory', [CategoryController::class, 'subindex'])->name('subcategory');
    Route::post('/createsubcategory', [CategoryController::class, 'subcreate'])->name('addsubcategory');
    Route::get('/addsubcategory', [CategoryController::class, 'subadd'])->name('subaddcategory');
    Route::get('/subcategory/{id}/delete', [CategoryController::class, 'subdelete'])->name('subdeletecategory');
     Route::get('editsubcategory/{id}', [CategoryController::class, 'subedit'])->name('editsubcategory');
     Route::post('/subcategory/{id}/edit', [CategoryController::class, 'editsubcategory'])->name('editsubcategorybyid');
     Route::get('subcatsearch',[CategoryController::class, 'subcatsearch'])->name('subcatsearch');
    Route::get('subcategory-file-export', [CategoryController::class, 'subfileExport'])->name('subcategory-file-export');
    Route::get('/subcategory/pdf', [CategoryController::class, 'subCategoryCreatePDF'])->name('subcategory-pdf');
    //User Management Routes

    

    //Visitor Management Routes

    Route::get('/visitor', [VisitorController::class, 'index'])->name('visitor');

    //Owner Management Routes

    Route::get('/owner', [OwnerController::class, 'index'])->name('owner');
    Route::post('/editowner', [OwnerController::class, 'edit'])->name('editowner');
    Route::post('/editmyowner', [OwnerController::class, 'editmyowner'])->name('editmyowner');
    Route::post('deleteowner', [OwnerController::class, 'deleteowner'])->name('deleteowner');
    Route::post('verify', [OwnerController::class, 'verify'])->name('verify');

    //Order Management Routes

    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::get('/createorder', [OrderController::class, 'add'])->name('createorder');
    
    Route::get('/editorder/{id}', [OrderController::class, 'edit'])->name('editorder');
    Route::post('/editmyorder/{id}/edit', [OrderController::class, 'editmyorder'])->name('editmyorder');
    Route::post('/addorder', [OrderController::class, 'addorder'])->name('addorder');
    Route::get('deleteorder/{id}', [OrderController::class, 'deleteorder'])->name('deleteorder');
    Route::get('order-file-export', [OrderController::class, 'fileExport'])->name('order-file-export');
   // Route::get('/employee/pdf', [EmployeeController::class, 'createPDF']);
 Route::get('/order/pdf', [OrderController::class, 'createPDF'])->name('orders-pdf');

    // Users All Data routes for Admin
    //Product Management Routes
    Route::get('/user-product', [ProductUserController::class, 'index'])->name('user-product');
    //Route::get('/viewproduct/{id}', [ProductUserController::class, 'view'])->name('viewproduct');
    /* Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('deleteproduct');
    Route::get('editproduct/deleteimage/{id}', [ProductController::class, 'deleteimage'])->name('deleteimage');
    Route::get('/verify/{id}', [ProductController::class, 'verify'])->name('verify');
    Route::get('/addproduct', [ProductController::class, 'add'])->name('addproduct');
    Route::get('/getSubCat', [ProductController::class, 'getSubCat'])->name('getSubCat');
    Route::get('/editproduct/{id}', [ProductController::class, 'edit'])->name('editproduct');
    Route::post('/addproduct', [ProductController::class, 'addproduct'])->name('addproduct');
    Route::post('/updateproduct', [ProductController::class, 'updateproduct'])->name('updateproduct');
    Route::get('productsearch',[ProductController::class, 'productsearch'])->name('productsearch'); */
     
     //Category
     Route::get('/user-category', [CategoryUserController::class, 'index'])->name('user-category');
   /* Route::get('/addcategory', [CategoryController::class, 'add'])->name('addcategory');
    Route::get('editcategory/{id}', [CategoryController::class, 'edit'])->name('editcategory');
    Route::post('/createcategory', [CategoryController::class, 'create'])->name('addcategory');
    Route::get('/category/{id}/delete', [CategoryController::class, 'delete'])->name('deletecategory');
    Route::post('/category/{id}/edit', [CategoryController::class, 'editcategory'])->name('editcategorybyid');
   Route::get('catsearch',[CategoryController::class, 'catsearch'])->name('catsearch'); */
   
     // Sub Category
    Route::get('/user-subcategory', [CategoryUserController::class, 'subindex'])->name('user-subcategory');
   /* Route::post('/createsubcategory', [CategoryController::class, 'subcreate'])->name('addsubcategory');
    Route::get('/addsubcategory', [CategoryController::class, 'subadd'])->name('subaddcategory');
    Route::get('/subcategory/{id}/delete', [CategoryController::class, 'subdelete'])->name('subdeletecategory');
     Route::get('editsubcategory/{id}', [CategoryController::class, 'subedit'])->name('editsubcategory');
     Route::post('/subcategory/{id}/edit', [CategoryController::class, 'editsubcategory'])->name('editsubcategorybyid');
     Route::get('subcatsearch',[CategoryController::class, 'subcatsearch'])->name('subcatsearch'); */


});



require __DIR__.'/auth.php';
