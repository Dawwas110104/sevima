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
})->name('welcome');

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

Route::get('/academic-year/{id}/subject', [App\Http\Controllers\AcademicYearController::class, 'subject'])->name('academic-year.subject');
Route::post('/academic-year/subject/store/', [App\Http\Controllers\AcademicYearController::class, 'subjectStore'])->name('academic-year.subject.store');

Route::get('/academic-year/{id}/class', [App\Http\Controllers\AcademicYearController::class, 'class'])->name('academic-year.class');
Route::post('/academic-year/class/store/', [App\Http\Controllers\AcademicYearController::class, 'classStore'])->name('academic-year.class.store');
Route::get('/academic-year/class/delete/{id}', [App\Http\Controllers\AcademicYearController::class, 'classDestroy'])->name('academic-year.class.delete');
Route::get('/academic-year/class/user/{id}', [App\Http\Controllers\AcademicYearController::class, 'classUser'])->name('academic-year.class.user');
Route::post('/academic-year/class/user/update/', [App\Http\Controllers\AcademicYearController::class, 'classUpdate'])->name('academic-year.class.user.update');
Route::get('/academic-year/class/user/delete/{id}', [App\Http\Controllers\AcademicYearController::class, 'classUserDestroy'])->name('academic-year.class.user.delete');

Route::get('/academic-year/class/schedule/{id}', [App\Http\Controllers\AcademicYearController::class, 'schedule'])->name('academic-year.class.schedule');
Route::post('/academic-year/class/schedule/store/', [App\Http\Controllers\AcademicYearController::class, 'scheduleStore'])->name('academic-year.schedule.store');
Route::post('/academic-year/class/schedule/delete/{id}', [App\Http\Controllers\AcademicYearController::class, 'scheduleDestroy'])->name('academic-year.schedule.delete');

Route::get('/academic-year/meeting/{id}', [App\Http\Controllers\AcademicYearController::class, 'meeting'])->name('academic-year.meeting');
Route::post('/academic-year/meeting/store/', [App\Http\Controllers\AcademicYearController::class, 'meetingStore'])->name('academic-year.meeting.store');
Route::get('/academic-year/meeting/edit/{id}', [App\Http\Controllers\AcademicYearController::class, 'meetingEdit'])->name('academic-year.meeting.edit');
Route::post('/academic-year/meeting/update/{id}', [App\Http\Controllers\AcademicYearController::class, 'meetingUpdate'])->name('academic-year.meeting.update');
Route::post('/academic-year/meeting/delete/{id}', [App\Http\Controllers\AcademicYearController::class, 'meetingDestroy'])->name('academic-year.meeting.delete');
Route::get('/academic-year/meeting/code/{id}', [App\Http\Controllers\AcademicYearController::class, 'code'])->name('academic-year.meeting.code');


Route::get('/material/{id}', [App\Http\Controllers\MaterialController::class, 'index'])->name('material.index');
Route::post('/material/store/', [App\Http\Controllers\MaterialController::class, 'store'])->name('material.store');
Route::get('/material/edit/{id}', [App\Http\Controllers\MaterialController::class, 'edit'])->name('material.edit');
Route::post('/material/update/{id}', [App\Http\Controllers\MaterialController::class, 'update'])->name('material.update');
Route::post('/material/delete/{id}', [App\Http\Controllers\MaterialController::class, 'destroy'])->name('material.delete');


Route::get('/subject', [App\Http\Controllers\SubjectController::class, 'index'])->name('subject.index');
Route::post('/subject/store', [App\Http\Controllers\SubjectController::class, 'store'])->name('subject.store');
Route::get('/subject/edit/{id}', [App\Http\Controllers\SubjectController::class, 'edit'])->name('subject.edit');
Route::post('/subject/update/{id}', [App\Http\Controllers\SubjectController::class, 'update'])->name('subject.update');
Route::get('/subject/delete/{id}', [App\Http\Controllers\SubjectController::class, 'destroy'])->name('subject.delete');



Route::get('/student', [App\Http\Controllers\StudentController::class, 'index'])->name('student.index');

Route::get('/teacher', [App\Http\Controllers\StudentController::class, 'teacher'])->name('teacher.index');

