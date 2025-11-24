<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/student-login', [StudentController::class, 'showLogin']) -> name('student.login');
Route::post('/student-login', [StudentController::class, 'login']) -> name('student.login');

Route::get('/student-register', [StudentController::class, 'showRegister']) -> name('student.register');
Route::post('/student-register', [StudentController::class, 'register']) -> name('student.register');

Route::get('/student-profile', [StudentController::class, 'prifile']) -> name('student.profile');

