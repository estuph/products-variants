<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\VariantsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;

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

// Authentication Routes
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login/process', [AuthController::class, 'login_process'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/process', [AuthController::class, 'register_process'])->name('register.process');

// Dashboard Route (Protected)
Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Users Resource Route
Route::resource('users', UsersController::class)->middleware('auth');

// Products Resource Route
Route::resource('products', ProductsController::class);

// Nested Variants Routes under Products
Route::prefix('products/{product}')->group(function() {
    Route::get('/variants', [VariantsController::class, 'index'])->name('products.variants.index');
    Route::get('/variants/create', [VariantsController::class, 'create'])->name('products.variants.create');
    Route::post('/variants', [VariantsController::class, 'store'])->name('products.variants.store');
});

// Shallow Routes for Variants
Route::prefix('variants')->group(function() {
    Route::get('{variant}', [VariantsController::class, 'show'])->name('variants.show');
    Route::get('{variant}/edit', [VariantsController::class, 'edit'])->name('variants.edit');
    Route::put('{variant}', [VariantsController::class, 'update'])->name('variants.update');
    Route::delete('{variant}', [VariantsController::class, 'destroy'])->name('variants.destroy');
});

// Custom Route for Updating Variant Stock
Route::patch('/variants/{variant}/update-stock', [VariantsController::class, 'updateStock'])->name('variants.updateStock');

// Additional Route for Products and Variants List
Route::get('/products-variants', [ProductsController::class, 'productVariantList'])->name('products.variants.list');