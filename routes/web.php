<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProductController;
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
        // Route::resource('categories');
        Route::resource('products', ProductController::class);
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