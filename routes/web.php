<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/a-propos', function () {
    return view('pages.a-propos');
});

// Services
Route::prefix('services')->group(function () {
    Route::get('/nettoyage', function () {
        return view('services.nettoyage.index');
    });
    Route::get('/evenementiel', function () {
        return view('services.evenementiel.index');
    });
    Route::get('/consulting', function () {
        return view('services.consulting.index');
    });
});

// Immobilier
Route::prefix('immobilier')->group(function () {
    Route::get('/', function () {
        return view('services.immobilier.index');
    });
    Route::get('/proprietes', function () {
        return view('services.immobilier.proprietes.index');
    });
    Route::get('/detail-propriete', function () {
        return view('services.immobilier.proprietes.detail');
    });
});

// Location de véhicules
Route::prefix('location-vehicule')->group(function () {

    // Routes Admin
    Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('slides', \App\Http\Controllers\Admin\SlideController::class);

        Route::get('/profile', function () {
            return view('admin.profile.edit');
        })->name('profile');

        Route::get('/settings', function () {
            return view('admin.settings');
        })->name('settings');
    });
    Route::get('/', function () {
        return view('services.location-vehicule.index');
    });
    Route::get('/vehicules', function () {
        return view('services.location-vehicule.vehicules.index');
    });
    Route::get('/detail-vehicule', function () {
        return view('services.location-vehicule.vehicules.detail');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('slides', App\Http\Controllers\Admin\SlideController::class)->names('admin.slides');
    });

require __DIR__ . '/auth.php';
