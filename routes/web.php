<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StaffController;
use App\Models\Section;

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

    Route::group(['prefix' => 'courses'], function () {
        Route::get('/trash', [CourseController::class, 'trash'])->name('courses.trash'); //
        Route::post('/restore/{id}', [CourseController::class, 'restore'])->name('courses.restore'); //khôi phục
        Route::post('/deleteforever/{id}', [CourseController::class, 'deleteforever'])->name('courses.deleteforever'); //viễn viễn
    });
    Route::resource('courses',CourseController::class);
    
    Route::resource('students',StudentController::class);
    Route::resource('staffs',StaffController::class);
    Route::resource('sections',SectionController::class);
});

    
