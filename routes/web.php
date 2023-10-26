<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Login & Logout
Route::get('/',[AuthController::class,'login'])->name('auth.login');
Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');
Route::post('/checkLogin',[AuthController::class,'checkLogin'])->name('auth.checkLogin');

// Admin
Route::middleware(['auth','preventhistory'])->group(function(){
    Route::resource('categories',CategoryController::class);
    Route::resource('levels',LevelController::class);

    Route::resource('students',StudentController::class);
    
    //Trao quyền
    Route::get('staffs/getPermission',[StaffController::class,'getPermission'])->name('staffs.getPermission');
    Route::post('staffs/pushPermission',[StaffController::class,'pushPermission'])->name('staffs.pushPermission');
    //

    Route::resource('staffs',StaffController::class);
});
