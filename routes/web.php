<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Authentification (non protégée)
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Groupe Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Gestion
    Route::get('/comptes', [AdminController::class, 'gestionComptes'])->name('admin.comptes');
    
    // Réservations
    Route::prefix('/reservations')->group(function () {
        Route::get('/', [AdminController::class, 'reservations'])->name('admin.reservations');
        Route::post('/{id}/annuler', [ReservationController::class, 'annuler'])->name('admin.reservations.annuler');
    });
    
    // Annulations
    Route::get('/annulations', [AdminController::class, 'annulations'])->name('admin.annulations');
    
    // Statistiques
    Route::prefix('/statistiques')->group(function () {
        Route::get('/', [StatistiqueController::class, 'index'])->name('admin.statistiques.index');
        Route::get('/jour', [StatistiqueController::class, 'parJour'])->name('admin.statistiques.jour');
        Route::get('/mois', [StatistiqueController::class, 'parMois'])->name('admin.statistiques.mois');
    });
});

// Groupe Personnel
Route::middleware(['auth', 'personnel'])->prefix('user')->group(function () {
    // Dashboard
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    
    // Réservations
    Route::prefix('/reservations')->group(function () {
        Route::get('/', [UserController::class, 'reservations'])->name('user.reservations');
        Route::post('/', [ReservationController::class, 'store'])->name('user.reservations.store');
        Route::post('/{id}/annuler', [ReservationController::class, 'annuler'])->name('user.reservations.annuler');
    });
    
    // Annulations
    Route::get('/annulations', [UserController::class, 'annulations'])->name('user.annulations');
    
    // Profil
    Route::prefix('/profile')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('user.profile.show');
        Route::put('/', [ProfileController::class, 'update'])->name('user.profile.update');
    });
});

// Routes de test (optionnelles)
Route::middleware('auth')->group(function () {
    Route::view('/admin-only', 'admin.only')->middleware('admin');
    Route::view('/user-only', 'user.only')->middleware('personnel');
});