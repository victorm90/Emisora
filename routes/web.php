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
        Route::post('admin/update-password', [AdminController::class, 'updatePasswordRequest'])->name('admin.update-password.request');
        Route::get('update-details', [AdminController::class, 'editDetails'])->name('admin.update-details');
        Route::post('update-details', [AdminController::class, 'updateDetails'])->name('admin.update-details.request');

        Route::get('subadmins', [AdminController::class, 'subadmins'])->name('admin.subadmins');
        Route::post('update-subadmin-status', [AdminController::class, 'updateSubadminStatus']);
        Route::get('delete-subadmin/{id}', [AdminController::class, 'deleteSubadmin']);

        Route::get('logout', [AdminController::class, 'destroy'])->name('admin.logout');
    });
});
