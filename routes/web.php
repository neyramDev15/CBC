<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/sales/create',[SaleController::class,'create'])->name('sales.create');
    Route::get('/sales/{id}/invoice', [SaleController::class, 'invoice'])->name('sales.invoice');
    Route::post('/sales',[SaleController::class,'store'])->name('sales.store');
    Route::resource('categories',CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('clients',ClientController::class)->middleware('auth');
    Route::resource('sales', SaleController::class)->middleware('auth');


});

require __DIR__.'/auth.php';
