<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/beranda', [PageController::class, 'home'])->name('home.alias');
Route::get('/profil-mahasiswa', [PageController::class, 'profile'])->name('profile');
Route::get('/ide-agent', [PageController::class, 'agent'])->name('agent');
Route::get('/hitung-ipk', [PageController::class, 'gpaCalculator'])->name('gpa');
Route::get('/feedback', [PageController::class, 'feedbackForm'])->name('feedback');
Route::post('/feedback', [PageController::class, 'feedback'])->name('feedback.store');
Route::get('/feedback/sukses', [PageController::class, 'feedbackSuccess'])->name('feedback.success');

Route::get('/dashboard/mahasiswa/{nrp}', [PageController::class, 'legacyProfile'])
	->where('nrp', '[0-9]{10}')
	->name('legacy.profile');
Route::get('/dashboard/hitung-ipk', [PageController::class, 'gpaCalculator'])->name('legacy.gpa');

Route::fallback([PageController::class, 'fallback']);
