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

Route::middleware(['auth:sanctum', 'verified', 'permission:dashboard.supervisor1', 'role_or_permission:Supervisor1|dashboard.supervisor1'])
    ->prefix('dashboard/supervisor1')
    ->name('dashboard.supervisor1.')
    ->group(function () {
        Route::get('/home', fn() => Inertia::render('Supervisor1Page/DashboardSupervisor1'))
            ->name('home');

    });
