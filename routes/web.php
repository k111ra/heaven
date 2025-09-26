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
    return view('index');
});
Route::get('/a-propos', function () {
    return view('a-propos');
});

Route::get('/nettoyage', function () {
    return view('nettoyage');
});

Route::get('/evenementiel', function () {
    return view('evenementiel');
});

Route::get('/location-vehicule', function () {
    return view('location-vehicule.location-vehicule');
});
Route::get('/location-vehicule/vehicules', function () {
    return view('location-vehicule.vehicules');
});
Route::get('/location-vehicule/detail-vehicule', function () {
    return view('location-vehicule.detail-vehicule');
});

Route::get('/consulting', function () {
    return view('consulting');
});

Route::get('/immobilier', function () {
    return view('immobilier.immobilier');
});

Route::get('/immobilier/proprietes', function () {
    return view('immobilier.proprietes');
});
Route::get('/immobilier/proprietes/detail', function () {
    return view('immobilier.detail-propriete');
});
Route::get('/contact', function () {
    return view('contact');
});
