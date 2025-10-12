<?php

use App\Http\Controllers\Admin\AdminProprieteController;
use App\Http\Controllers\ProprieteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\VehicleCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Routes publiques et administratives de l’application
|--------------------------------------------------------------------------
*/

// ===============================
// 🔹 ROUTES PUBLIQUES
// ===============================

// Accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Pages simples
Route::view('/a-propos', 'a-propos')->name('about');
Route::view('/contact', 'contact')->name('contact');

// ===============================
// 🔹 SERVICES
// ===============================
Route::prefix('services')->group(function () {
    Route::view('/nettoyage', 'services.nettoyage.index')->name('services.nettoyage');
    Route::view('/evenementiel', 'services.event.index')->name('services.event');
    Route::view('/consulting', 'services.consulting.index')->name('services.consulting');
});

// ===============================
// 🔹 IMMOBILIER
// ===============================
Route::prefix('immobilier')->name('immobilier.')->group(function () {
    Route::get('/', [ProprieteController::class, 'types'])->name('index');
    Route::get('/proprietes', [ProprieteController::class, 'index'])->name('proprietes.index');
    Route::get('/proprietes/recherche', [ProprieteController::class, 'search'])->name('proprietes.search');
    Route::post('/proprietes/{property}/contact', [ProprieteController::class, 'contact'])
        ->name('proprietes.contact')
        ->where('property', '[0-9]+');

    // Route principale pour le détail (celle utilisée dans les vues)
    Route::get('/detail-propriete/{property}', [ProprieteController::class, 'show'])
        ->name('detail')
        ->where('property', '[0-9]+');

    // Route alternative pour compatibilité
    Route::get('/{property}', [ProprieteController::class, 'show'])
        ->name('show')
        ->where('property', '[0-9]+');
});

// ===============================
// 🔹 LOCATION DE VÉHICULES
// ===============================
Route::prefix('location-vehicule')->name('location-vehicule.')->group(function () {
    Route::get('/', [App\Http\Controllers\VehiclePublicController::class, 'index'])->name('index');
    Route::get('/vehicules', [App\Http\Controllers\VehiclePublicController::class, 'list'])->name('list');
    Route::get('/{vehicle}', [App\Http\Controllers\VehiclePublicController::class, 'show'])->name('show')
        ->where('vehicle', '[0-9]+');
});

// ===============================
// 🔹 TABLEAU DE BORD UTILISATEUR
// ===============================
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ===============================
// 🔹 ADMINISTRATION
// ===============================
Route::prefix('admin')
    ->as('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        // Tableau de bord
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Gestion des utilisateurs et slides
        Route::resource('users', UserController::class);
        Route::resource('slides', SlideController::class);

        // Gestion des véhicules
        Route::resource('vehicules', VehicleController::class, ['parameters' => ['vehicules' => 'vehicle']]);
        Route::resource('vehicule-categories', VehicleCategoryController::class);

        // Pages internes admin
        Route::view('/profile', 'admin.profile.edit')->name('profile');
        Route::view('/settings', 'admin.settings')->name('settings');

        // Gestion des propriétés (immobilier)
        Route::resource('proprietes', AdminProprieteController::class)
            ->parameters(['proprietes' => 'propriete']);
    });

// ===============================
// 🔹 AUTH ROUTES
// ===============================
require __DIR__ . '/auth.php';
// ===============================
require __DIR__ . '/auth.php';
// 🔹 AUTH ROUTES
// ===============================
require __DIR__ . '/auth.php';
// ===============================
require __DIR__ . '/auth.php';
