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
Route::get('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');

Route::get('/role-user', [App\Http\Controllers\RoleUserController::class, 'index'])->name('role-user.index');
Route::post('/role-user/store', [App\Http\Controllers\RoleUserController::class, 'store'])->name('role-user.store');
Route::get('/role-user/edit/{id}', [App\Http\Controllers\RoleUserController::class, 'edit'])->name('role-user.edit');
Route::post('/role-user/update/{id}', [App\Http\Controllers\RoleUserController::class, 'update'])->name('role-user.update');
Route::get('/role-user/delete/{id}', [App\Http\Controllers\RoleUserController::class, 'delete'])->name('role-user.delete');

