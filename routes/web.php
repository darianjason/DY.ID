<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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

// all users access
Route::get('/', [ProductController::class, 'all']);
Route::get('/details/{Product:id}', [ProductController::class, 'details']);
Route::get('/search', [ProductController::class, 'search']);

// guests access
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [UserController::class, 'registerPage']);
Route::post('/register', [UserController::class, 'register']);

// authenticated users access
Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', [AuthController::class, 'logout']);
});