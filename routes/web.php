<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render( 'Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/dashboard', function () {
    $user = Auth::user();

    $painelRoutes = [
        'dashboard.gerente'      => 'dashboard.gerente.home',
        'dashboard.supervisor1'  => 'dashboard.supervisor1.home',
        'dashboard.supervisor2'  => 'dashboard.supervisor2.home',
        
    ];

    foreach ($painelRoutes as $permissao => $rota) {
        if ($user->hasPermissionTo($permissao)) {
            return redirect()->route($rota);
        }
    }

    Auth::logout();
    return redirect('/')->withErrors(['Você não tem permissão para acessar nenhum painel.']);
})->middleware(['auth:sanctum', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
require __DIR__ . '/gerente.php';
require __DIR__ . '/supervisor1.php';
require __DIR__ . '/supervisor2.php';


//Route::middleware(['auth:sanctum', 'verified', 'role_or_permission:Supervisor1|dashboard.supervisor1'])
//    ->get('/dashboard-supervisor1', fn() => Inertia::render('Supervisor1Page/DashboardSupervisor1'))
//    ->name('dashboard.supervisor1');
//
//Route::middleware(['auth:sanctum', 'verified', 'role_or_permission:Supervisor2|dashboard.supervisor2'])
//    ->get('/dashboard-supervisor2', fn() => Inertia::render('Supervisor2Page/DashboardSupervisor2'))
//    ->name('dashboard.supervisor2');
