<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
    ->group(function() {

      Route::prefix('admin')
        ->name('admin.')
        ->group(function() {
          Route::get('dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');
        });
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('orders', OrderController::class)->only('index');

        Route::get('orders/exportpdf',[ OrderController::class, 'exportpdf'])->name('orders.export-pdf');
        Route::post('orders/filter',[ OrderController::class, 'filter'])->name('orders.filter');
        // Route::prefix('reports')
        //     ->name('reports')
        //     ->group(function() {
        //         Route::get('')->name('index');
        //         Route::get('{report}/detail')->name('detail');
        //         Route::get('export')->name('export');
        //     });
    });

Auth::routes([
  'register' => false,
  'reset' => false,
  'confirm' => false
]);
Route::get('/', function() {
  return view('welcome');
});