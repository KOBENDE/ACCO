<<<<<<< HEAD
<?php 
use App\Http\Controllers\ProfileController;
=======
<?php

use App\Http\Controllers\AbsenceRequestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VacationRequestController;
>>>>>>> a69edf6c303f052ae25b90bab08e2593181b8ab8
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

<<<<<<< HEAD
// Page d'inscription
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Page de connexion
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Déconnexion
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Page de profil (protégée)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');

    // Tableaux de bord selon le rôle
    Route::get('/dashboard/directeur', function () {
        return view('dashboard.directeur');
    })->name('directeur.dashboard');

    Route::get('/dashboard/grh', function () {
        return view('dashboard.directeur');
    })->name('grh.dashboard');

    Route::get('/dashboard/chef_service', function () {
        return view('dashboard.directeur');
    })->name('chef.dashboard');

    Route::get('/dashboard/employe', function () {
        return view('dashboard.employe');
    })->name('employe.dashboard');
Route::post('/profil/update', [ProfileController::class, 'updatedProfile'])->name('profil.update');
Route::put('/profil/update-password', [ProfileController::class, 'updatePassword'])->name('profil.updatePassword');

<<<<<<< HEAD
Route::get('/', function () {
    return view('dashboard');
});

// Formulaire de création de demande
Route::get('/store', [LeaveRequestController::class, 'create'])->name('create');

// Enregistrer une nouvelle demande
Route::post('/store', [LeaveRequestController::class, 'store'])->name('store');
=======
});

// Routes pour la gestion du mot de passe oublié
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email'); 
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
=======
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
>>>>>>> a69edf6c303f052ae25b90bab08e2593181b8ab8
>>>>>>> dc59c1a289de40b4716f83c829e62c61b63aebf0
