<?php

use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/student-login', [StudentController::class, 'showLogin']) -> name('student.login') ->middleware('not-login');
Route::post('/student-login', [StudentController::class, 'login']) -> name('student.login');

Route::get('/student-register', [StudentController::class, 'showRegister']) -> name('student.register') ->middleware('not-login');
Route::post('/student-register', [StudentController::class, 'register']) -> name('student.register');

Route::get('/student-profile', [StudentController::class, 'profile']) -> name('student.profile') ->middleware('is-login');

Route::get('/student-logout', [StudentController::class, 'logout']) -> name('student.logout');

// for staff

Route::get('/staff-login', [StaffController::class, 'showLogin']) -> name('staff.login')->middleware('staff-middleware');
Route::post('/staff-login', [StaffController::class, 'login']) -> name('staff.login');

Route::get('/staff-register', [StaffController::class, 'showRegister']) -> name('staff.register')->middleware('staff-middleware');
Route::post('/staff-register', [StaffController::class, 'register']) -> name('staff.register');

Route::get('/staff-profile', [StaffController::class, 'profile']) -> name('staff.profile')->middleware('isStaff');

Route::get('/staff-account', [StaffController::class, 'account']) -> name('staff.account')->middleware('isAccount');

Route::get('/staff-logout', [StaffController::class, 'logout']) -> name('staff.logout');
Route::get('/staff-activation/{token}',[StaffController::class, 'activateAccount'])->name('staff.activation');
Route::get('/staff-otp-activate',[StaffController::class, 'showOTPForm'])->name('staff.otp');
Route::post('/staff-otp-activate',[StaffController::class, 'showOTPActivate'])->name('staff.otp');