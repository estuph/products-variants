<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CobaController;
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
// Route::get('/',[CobaController::class, 'index'])->name('/');

Route::get('/',[AuthController::class, 'login'])->name('login');

Route::post('/login/process',[AuthController::class, 'login_process'])->name('login.process');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/register',[AuthController::class, 'register'])->name('register');

Route::post('/register/process',[AuthController::class, 'register_process'])->name('register.process');


Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')
});

Route::resource('users', UsersController::class);

// Route::resource('/products', ProductsController::class);
Route::resource('products', ProductsController::class);
Route::resource('/products', ProductsController::class);
Route::resource('/products.variants', VariantsController::class)->shallow(); //bagian variant, double code dibawah

Route::get('/products-variants', [ProductsController::class, 'productVariantList'])->name('products.variants.list');

Route::get('products/{id}/variants', [ProductsController::class, 'show'])->name('products.variants');

// Routes for variants nested under products
Route::prefix('/products/{product}')->group(function() {
    Route::get('/variants', [VariantsController::class, 'index'])->name('products.variants.index');
    Route::get('/variants/create', [VariantsController::class, 'create'])->name('products.variants.create');
    Route::post('/variants', [VariantsController::class, 'store'])->name('products.variants.store');
});

// Routes for variants (using shallow routing)
Route::prefix('variants')->group(function() {
    Route::get('{variant}', [VariantsController::class, 'show'])->name('variants.show');
    Route::get('{variant}/edit', [VariantsController::class, 'edit'])->name('variants.edit');
    Route::put('{variant}', [VariantsController::class, 'update'])->name('variants.update');
    Route::delete('{variant}', [VariantsController::class, 'destroy'])->name('variants.destroy');
});

Route::patch('/variants/{variant}/update-stock', [VariantsController::class, 'updateStock'])->name('variants.updateStock');

