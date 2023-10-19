<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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
Route::get('/login',[AuthController::class,'login'])->name('auth.login');
Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');
Route::post('/checkLogin',[AuthController::class,'checkLogin'])->name('auth.checkLogin');
Route::get('/register',[AuthController::class,'register'])->name('auth.register');
Route::post('/checkRegister',[AuthController::class,'checkRegister'])->name('auth.checkRegister');

// Admin
Route::get('/', function () {
    return view('admin.feature.index');
});


Route::middleware(['auth','preventhistory'])->group(function(){
    Route::resource('categories',CategoryController::class);
    Route::resource('levels',LevelController::class);
});
