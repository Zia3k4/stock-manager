<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\Supervisor1Controller;

Route::middleware(['auth', 'permission:dashboard.supervisor1'])->prefix('supervisor1')->name('supervisor1.')->group(function () {
    Route::get('/dashboard', [Supervisor1Controller::class, 'index'])->name('dashboard');

    Route::resource('/fornecedores', FornecedorController::class)->middleware([
        'permission:fornecedores.index|fornecedores.create|fornecedores.edit|fornecedores.delete|fornecedores.show'
    ]);
});
