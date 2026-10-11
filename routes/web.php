<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TeachingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteCardController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'role:admin,pastor'])
    ->name('dashboard');

Route::middleware(['auth', 'role:admin,pastor'])->group(function () {
    Route::resource('teachings', TeachingController::class)->except(['show']);
    Route::patch('teachings/{teaching}/toggle-status', [TeachingController::class, 'toggleStatus'])
        ->name('teachings.toggle-status');

    Route::resource('programs', ProgramController::class)->except(['show']);

    Route::resource('announcements', AnnouncementController::class)->except(['show']);
    Route::patch('announcements/{announcement}/toggle-status', [AnnouncementController::class, 'toggleStatus'])
        ->name('announcements.toggle-status');

    Route::resource('quote-cards', QuoteCardController::class)->except(['show']);
    Route::patch('quote-cards/{quote_card}/toggle-status', [QuoteCardController::class, 'toggleStatus'])
        ->name('quote-cards.toggle-status');    
});