<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'login_admin'])->name('login'); // Assuming showLoginForm is the method to show the login form
Route::get('admin', [AuthController::class, 'login_admin']); // Assuming login_admin is the method for admin login
Route::post('admin', [AuthController::class, 'auth_login_admin'])->name('auth.login.admin');
Route::get('admin/logout', [AuthController::class, 'auth_logout'])->name('auth.logout');

Route::middleware(['auth'])->group(function () {

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/admin/list', [AdminController::class, 'list'])->name('adminList');
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert'])->name('insert');
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);

});

