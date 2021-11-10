<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
  ->group(function () {

    Route::prefix('admin')
      ->name('admin.')
      ->group(function () {

        Route::get('dashboard', [DashboardController::class, 'index'])
          ->name('dashboard');

        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class)->except('show');

        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{invoice}', [OrderController::class, 'show'])->name('orders.show');
        Route::delete('/orders/{invoice}', [OrderController::class, 'destroy'])->name('orders.destroy');
        Route::post('/orders/{invoice}/set-processed', [OrderController::class, 'setProcessed'])->name('orders.setProcessed');
        Route::post('/orders/{invoice}/set-shipped', [OrderController::class, 'setShipped'])->name('orders.setShipped');
        Route::post('/orders/{invoice}/set-done', [OrderController::class, 'setDone'])->name('orders.setDone');

        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
        Route::get('/reports/export-pdf', [ReportController::class, 'exportPdf'])->name('reports.exportPdf');
      });
  });

Auth::routes([
  'register' => false,
  'reset' => false,
  'confirm' => false
]);
Route::get('/', function () {
  return view('welcome');
});
