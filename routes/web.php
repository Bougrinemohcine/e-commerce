<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});


    Route::get('admin',[AuthController::class,'login_admin']);
    Route::post('admin',[AuthController::class,'auth_login_admin'])->name('auth.login.admin');
    Route::get('admin/logout',[AuthController::class,'auth_logout'])->name('auth.logout');


    Route::get('admin/dashboard',function(){
        return view('admin.dashboard');
    });

    Route::get('admin/admin/list',function(){
        return view('admin.admin.list');
    });
