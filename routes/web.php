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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// HomeController
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/status', [App\Http\Controllers\HomeController::class, 'status'])->name('status');

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
});

//Updates
Route::prefix('updates')->group(function () {
    Route::get('/create', [App\Http\Controllers\UpdatesController::class, 'create'])->name('updates.create');
    Route::post('/store', [App\Http\Controllers\UpdatesController::class, 'store'])->name('updates.store');
    Route::get('/edit/{id}', [App\Http\Controllers\UpdatesController::class, 'edit'])->name('updates.edit');
    Route::post('/update/{id}', [App\Http\Controllers\UpdatesController::class, 'update'])->name('updates.update');
    Route::post('/delete/{id}', [App\Http\Controllers\UpdatesController::class, 'destroy'])->name('updates.destroy');
});
