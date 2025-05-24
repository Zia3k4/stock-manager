<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Supervisor2Controller;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\VendasController;

Route::middleware(['auth', 'permission:dashboard.supervisor2'])->prefix('supervisor2')->name('supervisor2.')->group(function () {
    Route::get('/dashboard', [Supervisor2Controller::class, 'index'])->name('dashboard');

    Route::resource('/produtos', ProdutosController::class)->middleware([
        'permission:produtos.index|produtos.create|produtos.edit|produtos.delete|produtos.show'
    ]);

    Route::resource('/estoque', EstoqueController::class)->middleware([
        'permission:estoque.index|estoque.create|estoque.edit|estoque.delete|estoque.show'
    ]);

    Route::resource('/vendas', VendasController::class)->middleware([
        'permission:vendas.index|vendas.create|vendas.edit|vendas.delete|vendas.show'
    ]);
});
