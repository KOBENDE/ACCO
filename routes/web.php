<?php

use App\Http\Controllers\AbsenceRequestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VacationRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.index');
});



// Authentification routes
Route::get('/signin', [AuthController::class, 'login'])->name('login');
// Route::get('/signout', [AuthController::class, 'register'])->name('register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('auth_login', [AuthController::class, 'auth_login'])->name('auth_login');
Route::post('create_user', [AuthController::class, 'create_user'])->name('create_user');
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
Route::put('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update')->middleware('auth');
Route::put('/profile/password', [AuthController::class, 'updatePassword'])->name('profile.password')->middleware('auth');

// dashbord routes
Route::get('/dashboard', [DashboardController::class, 'index']);
// Demandes de congés
Route::resource('absencerequests', AbsenceRequestController::class);
// Demandes d'absences
Route::resource('vacationrequest', VacationRequestController::class);
