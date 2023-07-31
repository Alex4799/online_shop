<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['authMiddleware'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('loginPage');
    });
    Route::get('loginPage',[AuthController::class,'loginPage'])->name('loginPage');
    Route::get('registerPage',[AuthController::class,'registerPage'])->name('registerPage');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');
    Route::get('page/404',[AuthController::class,'Page404'])->name('404Page');

    //admin
    Route::middleware(['adminMiddleware'])->group(function () {

        // Category
        Route::get('admin/category/list/{id}',[CategoryController::class,'categoryList'])->name('admin#categoryList');
        Route::get('admin/category/add/page',[CategoryController::class,'addCategoryPage'])->name('admin#addCategoryPage');
        Route::post('admin/category/add',[CategoryController::class,'addCategory'])->name('admin#addCategory');
        Route::get('admin/category/status/change/{status}/{id}',[CategoryController::class,'changeStatus'])->name('admin#changeStatus');
        Route::get('admin/category/edit/{id}',[CategoryController::class,'editCategory'])->name('admin#editCategory');
        Route::post('admin/category/update',[CategoryController::class,'updateCategory'])->name('admin#updateCategory');
        Route::get('admin/category/delete/{id}',[CategoryController::class,'deleteCategory'])->name('admin#deleteCategory');

        //product
        Route::get('admin/product/list/{id}',[ProductController::class,'productList'])->name('admin#productList');
        Route::get('admin/product/create/page',[ProductController::class,'createProductPage'])->name('admin#createProductPage');
        Route::post('admin/product/create',[ProductController::class,'createProduct'])->name('admin#createProduct');
        Route::get('admin/product/view/{id}',[ProductController::class,'viewProduct'])->name('admin#viewProduct');
        Route::get('admin/product/change/status/{status}/{id}',[ProductController::class,'changeProductStatus'])->name('admin#changeProductStatus');
        Route::get('admin/product/edit/{id}',[ProductController::class,'editProduct'])->name('admin#editProduct');
        Route::post('admin/product/update',[ProductController::class,'updateProduct'])->name('admin#updateProduct');
        Route::get('admin/product/delete/{id}',[ProductController::class,'deleteProduct'])->name('admin#deleteProduct');

    });

    //user

    Route::get('user/home',[UserController::class,'homePage'])->name('user#homePage');

    // product
    Route::get('user/product/list',[ProductController::class,'productList_user'])->name('user#productList');
    Route::post('user/product/list/filter',[ProductController::class,'productListFilter_user'])->name('user#productListFilter');
    Route::post('user/product/list/search',[ProductController::class,'productListSearch_user'])->name('user#productListSearch');
    Route::get('user/product/list/category/{id}',[ProductController::class,'productListCategory_user'])->name('user#productListCategory');
    Route::get('user/product/view/{id}',[ProductController::class,'viewProduct_user'])->name('user#viewProduct');

    // category
    Route::get('user/category/list',[CategoryController::class,'categoryList_user'])->name('user#categoryList');
    Route::get('user/category/view/{id}',[CategoryController::class,'viewCategory_user'])->name('user#viewCategory');

});
