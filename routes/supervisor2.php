<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => \Illuminate\Foundation\Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified', 'permission:dashboard.supervisor2', 'role_or_permission:Supervisor2|dashboard.supervisor2'])
    ->prefix('dashboard/supervisor2')
    ->name('dashboard.supervisor2.')
    ->group(function () {
        Route::get('/home', fn() => Inertia::render('Supervisor2Page/DashboardSupervisor2'))
            ->name('home');

    });
