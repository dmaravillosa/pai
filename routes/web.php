<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// HomeController
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
Route::get('/announcement', [App\Http\Controllers\HomeController::class, 'announcement'])->name('announcement');
Route::get('/classess', [App\Http\Controllers\HomeController::class, 'classess'])->name('classess');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/status', [App\Http\Controllers\HomeController::class, 'status'])->name('status');
Route::get('/confirm', [App\Http\Controllers\HomeController::class, 'confirm'])->name('confirm');

// PageController
Route::get('/', [App\Http\Controllers\PageController::class, 'events'])->name('events');
Route::get('/about', [App\Http\Controllers\PageController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\PageController::class, 'contact'])->name('contact');

// Teachers
Route::prefix('teachers')->group(function () {
    Route::get('/edit/{id}', [App\Http\Controllers\TeacherController::class, 'edit'])->name('teachers.edit');
    Route::post('/update/{id}', [App\Http\Controllers\TeacherController::class, 'update'])->name('teachers.update');
    Route::post('/delete/{id}', [App\Http\Controllers\TeacherController::class, 'destroy'])->name('teachers.destroy');
});

// Classroom
Route::prefix('classroom')->group(function () {
    Route::get('/view', [App\Http\Controllers\ClassroomController::class, 'view'])->name('classroom.view');
    Route::post('/import', [App\Http\Controllers\ClassroomController::class, 'import'])->name('classroom.import');
    Route::post('/delete/{id}', [App\Http\Controllers\ClassroomController::class, 'delete'])->name('classroom.delete');
});

// Students
Route::prefix('students')->group(function () {
    Route::get('/view/{id}', [App\Http\Controllers\StudentController::class, 'view'])->name('students.view');
    Route::get('/list', [App\Http\Controllers\StudentController::class, 'list'])->name('students.list');
    Route::get('/lock/{id}/{unlock?}', [App\Http\Controllers\StudentController::class, 'lock'])->name('students.lock');
    Route::post('/unlock/{id}', [App\Http\Controllers\StudentController::class, 'unlock'])->name('students.unlock');
    Route::post('/update/{id}', [App\Http\Controllers\StudentController::class, 'update'])->name('students.update');
    Route::post('/remark/{id}', [App\Http\Controllers\StudentController::class, 'remark'])->name('students.remark');
});

//Grades
Route::prefix('grades')->group(function () {
    Route::get('/view/{id}', [App\Http\Controllers\GradesController::class, 'view'])->name('grades.view');
});

//Updates
Route::prefix('updates')->group(function () {
    Route::get('/create', [App\Http\Controllers\UpdatesController::class, 'create'])->name('updates.create');
    Route::post('/store', [App\Http\Controllers\UpdatesController::class, 'store'])->name('updates.store');
    Route::get('/edit/{id}', [App\Http\Controllers\UpdatesController::class, 'edit'])->name('updates.edit');
    Route::post('/update/{id}', [App\Http\Controllers\UpdatesController::class, 'update'])->name('updates.update');
    Route::post('/delete/{id}', [App\Http\Controllers\UpdatesController::class, 'destroy'])->name('updates.destroy');
});

//SchoolYearConfig
Route::prefix('syc')->group(function () {
    Route::get('/create/{id}', [App\Http\Controllers\SchoolYearConfigController::class, 'create'])->name('syc.create');
    Route::post('/store/{id}', [App\Http\Controllers\SchoolYearConfigController::class, 'store'])->name('syc.store');
    Route::post('/update/{id}', [App\Http\Controllers\SchoolYearConfigController::class, 'update'])->name('syc.update');
});
