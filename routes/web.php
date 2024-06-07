<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layout.master');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::put('/profile/{id}', [ProfileController::class, 'update']);
    Route::resource('students', StudentController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('subjects', SubjectController::class);
});
