<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profil-mahasiswa', [PageController::class, 'profile'])->name('profile');
Route::get('/ide-agent', [PageController::class, 'agent'])->name('agent');
Route::get('/hitung-ipk', [PageController::class, 'gpaCalculator'])->name('gpa');

Route::fallback(function () {
	return response()->view('pages.404', [], 404);
});
