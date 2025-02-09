<?php

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
    return view('dashboard');
});

// Formulaire de création de demande
Route::get('/store', [LeaveRequestController::class, 'create'])->name('create');

// Enregistrer une nouvelle demande
Route::post('/store', [LeaveRequestController::class, 'store'])->name('store');