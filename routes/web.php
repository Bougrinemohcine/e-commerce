<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'login_admin'])->name('login'); // Assuming showLoginForm is the method to show the login form
Route::get('admin', [AuthController::class, 'login_admin']); // Assuming login_admin is the method for admin login
Route::post('admin', [AuthController::class, 'auth_login_admin'])->name('auth.login.admin');
Route::get('admin/logout', [AuthController::class, 'auth_logout'])->name('auth.logout');

Route::middleware(['auth'])->group(function () {

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']); // Assuming login_admin is the method for admin login

    Route::get('admin/admin/list', function () {
        $data['header_title'] = 'Admin';
        return view('admin.admin.list',$data);
    });
});

