<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

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

// all user access
Route::get('/', [ProductController::class, 'all']);
Route::get('/product/{id}', [ProductController::class, 'product']);
Route::get('/search', [ProductController::class, 'search']);

// guest access
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [UserController::class, 'registerPage']);
Route::post('/register', [UserController::class, 'register']);

// authenticated user access
Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('/product/{id}', [CartController::class, 'addToCart']);
    Route::get('/cart', [CartController::class, 'cart']);
    Route::get('/cart/edit/{id}', [CartController::class, 'editProductPage']);
    Route::patch('/cart/{id}', [CartController::class, 'editProduct']);
    Route::delete('/cart/{id}', [CartController::class, 'removeProduct']);

    // admin access
    Route::group(['middleware' => ['security']], function() {
        Route::get('/products', [ProductController::class, 'viewProducts']);
        Route::get('/products/add', [ProductController::class, 'insertProductPage']);
        Route::post('/products', [ProductController::class, 'insertProduct']);
        Route::get('/products/edit/{id}', [ProductController::class, 'updateProductPage']);
        Route::patch('/products/{id}', [ProductController::class, 'updateProduct']);
        Route::delete('/products/{id}', [ProductController::class, 'deleteProduct']);
        Route::get('/categories', [CategoryController::class, 'viewCategories']);
        Route::get('/categories/add', [CategoryController::class, 'insertCategoryPage']);
        Route::post('/categories', [CategoryController::class, 'insertCategory']);
        Route::get('/categories/edit/{id}', [CategoryController::class, 'updateCategoryPage']);
        Route::patch('/categories/{id}', [CategoryController::class, 'updateCategory']);
        Route::delete('/categories/{id}', [CategoryController::class, 'deleteCategory']);
    });
});