<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\Supervisor1Controller;

Route::middleware(['auth:sanctum', 'permission:dashboard.supervisor1'])->prefix('supervisor1')->name('supervisor1.')->group(function () {
    Route::get('/dashboard', [Supervisor1Controller::class, 'index'])->name('dashboard');

    Route::resource('/fornecedores', FornecedorController::class)->middleware([
        'permission:fornecedores.index|fornecedores.create|fornecedores.edit|fornecedores.delete|fornecedores.show'
    ]);

    //gerente e  suas permissoes

    Route::middleware(['auth','role:Gerente'])->group(function () {
        //exports
    //    Route::get('/relatorios', [Supervisor1Controller::class, 'relatorios'])->name('relatorios');
      //  Route::get('/relatorios/exportar', [Supervisor1Controller::class, 'exportarRelatorio'])->name('relatorios.exportar');


    });
});
