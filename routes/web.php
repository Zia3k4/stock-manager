<?php

use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\GerenteController;
use App\Http\Controllers\Supervisor1Controller;
use App\Http\Controllers\Supervisor2Controller;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // minhas rotas
    Route::middleware(['role:admin'])->prefix('gerente')->name('gerente.')->group(function () {
        Route::get('/dashboard', [GerenteController::class, 'index'])->name('dashboard');

        // Funcionalidades do gerente
        Route::get('/relatorios', [GerenteController::class, 'relatorios'])->name('relatorios');
        Route::resource('/funcionarios', FuncionarioController::class);

        // Acesso indireto aos dashboards dos supervisores (links, exibição, não navegação direta)
        Route::get('/supervisor1', [Supervisor1Controller::class, 'index'])->name('supervisor1.dashboard');
        Route::get('/supervisor2', [Supervisor2Controller::class, 'index'])->name('supervisor2.dashboard');
    });

    // Dashboard Supervisor 1 (Fornecedores)
    Route::middleware(['role:supervisor1'])->prefix('supervisor1')->name('supervisor1.')->group(function () {
        Route::get('/dashboard', [Supervisor1Controller::class, 'index'])->name('dashboard');
        Route::resource('/fornecedores', FornecedorController::class);
    });

    // Dashboard Supervisor 2 (Produtos e Estoque)
    Route::middleware(['role:supervisor2'])->prefix('supervisor2')->name('supervisor2.')->group(function () {
        Route::get('/dashboard', [Supervisor2Controller::class, 'index'])->name('dashboard');
        Route::resource('/produtos', ProdutosController::class);
        Route::resource('/estoque', EstoqueController::class);
    });

});
//nao remover esta parte debaixo
require __DIR__.'/auth.php';
