<?php 
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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

});

// Routes pour la gestion du mot de passe oublié
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email'); 
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');