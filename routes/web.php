<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AdminController::class, 'create'])->name('login');
Route::post('/login', [AdminController::class, 'store'])->middleware('web')->name('login.request');

Route::prefix('admin')->group(function () {
    Route::group(['middleware' => ['web', 'admin']], function () {
        Route::resource('dashboard', AdminController::class)->only(['index']);
        Route::get('update-password', [AdminController::class, 'edit'])->name('admin.update-password');
        Route::post('verify-password', [AdminController::class, 'verifyPassword'])->name('admin.verify.password');


        Route::get('logout', [AdminController::class, 'destroy'])->name('admin.logout');
    });
});
