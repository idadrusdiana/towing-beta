<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['role:superadmin|store|driver'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('public.home');
    Route::get('/home/{store_id}', [HomeController::class, 'orderList'])->name('home.orderList');
});

Route::middleware(['role:superadmin|store'])->group(function () {
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/store-history/{store_id}', [HomeController::class, 'storeHistory'])->name('home.storeHistory');
});

Route::middleware(['role:superadmin'])->group(function () {
    Route::get('/order/{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
    Route::put('/order/{id}', [OrderController::class, 'update'])->name('order.update');
});

Route::middleware(['role:driver'])->group(function () {
    Route::get('/driver-order/{driver_id}', [HomeController::class, 'driverOrder'])->name('home.driverOrder');
    Route::get('/driver-order/{order_id}/edit', [OrderController::class, 'driverOrderEdit'])->name('home.driverOrderEdit');
    Route::put('/driver-order/{order_id}', [OrderController::class, 'updateDriver'])->name('home.updateDriver');
    Route::get('driver-history/{driver_id}', [HomeController::class, 'driverHistory'])->name('home.driverHistory');
});

Route::prefix('admin')->group(function () {});
