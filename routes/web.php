<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('groups', GroupController::class);

Route::resource('students', StudentController::class);


Route::resource('groups', GroupController::class);

// Вложенные маршруты для студентов в группе
Route::get('/groups/{group}/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/groups/{group}/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/groups/{group}/students/{student}', [StudentController::class, 'show'])->name('students.show');
