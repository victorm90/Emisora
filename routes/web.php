<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AdminController::class, 'create'])->name('login');
    Route::post('/login', [AdminController::class, 'store'])->middleware('web')->name('login.request');

Route::prefix('admin')->group(function () {     
    Route::group(['middleware' => ['web', 'admin']], function () {
        Route::resource('dashboard', AdminController::class)->only(['index']);
    });
});

