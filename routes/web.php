<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.delete');

Route::get('/academic-year', [App\Http\Controllers\AcademicYearController::class, 'index'])->name('academic-year.index');
Route::post('/academic-year/store', [App\Http\Controllers\AcademicYearController::class, 'store'])->name('academic-year.store');
Route::get('/academic-year/edit/{id}', [App\Http\Controllers\AcademicYearController::class, 'edit'])->name('academic-year.edit');
Route::post('/academic-year/update/{id}', [App\Http\Controllers\AcademicYearController::class, 'update'])->name('academic-year.update');
Route::get('/academic-year/delete/{id}', [App\Http\Controllers\AcademicYearController::class, 'destroy'])->name('academic-year.delete');
Route::post('/academic-year/publish/{id}', [App\Http\Controllers\AcademicYearController::class, 'publish'])->name('academic-year.publish');

