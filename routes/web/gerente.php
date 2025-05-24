<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GerenteController;
use App\Http\Controllers\Supervisor1Controller;
use App\Http\Controllers\Supervisor2Controller;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RHServiceController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutosController;
//lembre-se o gerente é o admin, ele pode ter acesso a todas as rotas

Route::middleware(['auth', 'permission:dashboard.gerente'])->prefix('gerente')->name('gerente.')->group(function () {
    Route::get('/dashboard', [GerenteController::class, 'index'])->name('dashboard');

    Route::get('/relatorios', [GerenteController::class, 'relatorios'])->middleware('permission:relatorios.ver')->name('relatorios');
    Route::get('/relatorios/exportar', [GerenteController::class, 'exportar'])->middleware('permission:relatorios.exportar')->name('relatorios.exportar');

    Route::resource('/funcionarios', FuncionarioController::class)->middleware([
        'permission:funcionarios.index|funcionarios.create|funcionarios.edit|funcionarios.delete|funcionarios.show'
    ]);

    Route::resource('/usuarios', UsuarioController::class)->middleware([
        'permission:usuarios.index|usuarios.create|usuarios.edit|usuarios.delete|usuarios.show'
    ]);

    Route::get('/rhservice', [RHServiceController::class, 'index'])->middleware('permission:rhservice.index')->name('rh.index');
    Route::get('/rhservice/create', [RHServiceController::class, 'create'])->middleware('permission:rhservice.create')->name('rh.create');
    Route::get('/rhservice/{id}', [RHServiceController::class, 'show'])->middleware('permission:rhservice.show')->name('rh.show');
    Route::get('/rhservice/{id}/edit', [RHServiceController::class, 'edit'])->middleware('permission:rhservice.edit')->name('rh.edit');

    // Acesso às visões dos supervisores
    Route::get('/supervisor1', [Supervisor1Controller::class, 'index'])->name('supervisor1.dashboard');
    Route::get('/supervisor2', [Supervisor2Controller::class, 'index'])->name('supervisor2.dashboard');
});
