<?php

use App\Http\Controllers\DashboardGerenteControllers\UsuarioController;
use App\Http\Controllers\DashboardGerenteControllers\FuncionarioController;
use App\Http\Controllers\DashboardGerenteControllers\HorasTrabalhadasController;
use App\Http\Controllers\DashboardGerenteControllers\RelatorioController;
use App\Http\Controllers\DashboardGerenteControllers\RHServiceController;
use App\Http\Controllers\Auth\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::middleware(['auth:sanctum', 'verified', 'permission:dashboard.gerente', 'role_or_permission:Gerente|dashboard.gerente'])
    ->prefix('dashboard/gerente')
    ->name('dashboard.gerente.')
    ->group(function () {

        // ADICIONE ESTA ROTA PRINCIPAL PARA O PAINEL DO GERENTE:
        Route::get('/home', function () {
            return Inertia::render('GerentePage/DashboardGerente');
        })->name('home');
        // Usuários
        Route::get('/usuarios', [UsuarioController::class, 'index'])
            ->name('usuarios.index')
            ->middleware('permission:usuarios.index');
        Route::get('/usuarios/create', [UsuarioController::class, 'create'])
            ->name('gerente.usuarios.create')
            ->middleware('permission:usuarios.create');
        Route::post('/usuarios', [UsuarioController::class, 'store'])
            ->name('gerente.usuarios.store')
            ->middleware('permission:usuarios.store');
        Route::get('/usuarios/{usuario}', [UsuarioController::class, 'show'])
            ->name('gerente.usuarios.show')
            ->middleware('permission:usuarios.show');
        Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])
            ->name('gerente.usuarios.edit')
            ->middleware('permission:usuarios.edit');
        Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])
            ->name('gerente.usuarios.update')
            ->middleware('permission:usuarios.update');
        Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])
            ->name('gerente.usuarios.destroy')
            ->middleware('permission:usuarios.destroy');

        // Funcionários
        Route::get('/funcionarios', [FuncionarioController::class, 'index'])
            ->name('gerente.funcionarios.index')
            ->middleware('permission:funcionarios.index');
        Route::get('/funcionarios/create', [FuncionarioController::class, 'create'])
            ->name('gerente.funcionarios.create')
            ->middleware('permission:funcionarios.create');
        Route::post('/funcionarios', [FuncionarioController::class, 'store'])
            ->name('gerente.funcionarios.store')
            ->middleware('permission:funcionarios.store');
        Route::get('/funcionarios/{funcionario}', [FuncionarioController::class, 'show'])
            ->name('gerente.funcionarios.show')
            ->middleware('permission:funcionarios.show');
        Route::get('/funcionarios/{funcionario}/edit', [FuncionarioController::class, 'edit'])
            ->name('gerente.funcionarios.edit')
            ->middleware('permission:funcionarios.edit');
        Route::put('/funcionarios/{funcionario}', [FuncionarioController::class, 'update'])
            ->name('gerente.funcionarios.update')
            ->middleware('permission:funcionarios.update');
        Route::delete('/funcionarios/{funcionario}', [FuncionarioController::class, 'destroy'])
            ->name('gerente.funcionarios.destroy')
            ->middleware('permission:funcionarios.destroy');

        // Horas Trabalhadas
        Route::get('/horas-trabalhadas', [HorasTrabalhadasController::class, 'index'])
            ->name('gerente.horas-trabalhadas.index')
            ->middleware('permission:horas-trabalhadas.index');
        Route::get('/horas-trabalhadas/create', [HorasTrabalhadasController::class, 'create'])
            ->name('gerente.horas-trabalhadas.create')
            ->middleware('permission:horas-trabalhadas.create');
        Route::post('/horas-trabalhadas', [HorasTrabalhadasController::class, 'store'])
            ->name('gerente.horas-trabalhadas.store')
            ->middleware('permission:horas-trabalhadas.store');
        Route::get('/horas-trabalhadas/{horasTrabalhada}', [HorasTrabalhadasController::class, 'show'])
            ->name('gerente.horas-trabalhadas.show')
            ->middleware('permission:horas-trabalhadas.show');
        Route::get('/horas-trabalhadas/{horasTrabalhada}/edit', [HorasTrabalhadasController::class, 'edit'])
            ->name('gerente.horas-trabalhadas.edit')
            ->middleware('permission:horas-trabalhadas.edit');
        Route::put('/horas-trabalhadas/{horasTrabalhada}', [HorasTrabalhadasController::class, 'update'])
            ->name('gerente.horas-trabalhadas.update')
            ->middleware('permission:horas-trabalhadas.update');
        Route::delete('/horas-trabalhadas/{horasTrabalhada}', [HorasTrabalhadasController::class, 'destroy'])
            ->name('gerente.horas-trabalhadas.destroy')
            ->middleware('permission:horas-trabalhadas.destroy');

        // Relatórios
        Route::get('/relatorios', [RelatorioController::class, 'index'])//fazer os metodos de create, store, show, edit, update e destroy
            ->name('gerente.relatorios.index')
            ->middleware('permission:relatorios.index');
        Route::get('/relatorios/create', [RelatorioController::class, 'create']) //fazer os metodos de create, store, show, edit, update e destroy
            ->name('gerente.relatorios.create')
            ->middleware('permission:relatorios.create');
        Route::post('/relatorios', [RelatorioController::class, 'store'])  //fazer os metodos de create, store, show, edit, update e destroy
            ->name('gerente.relatorios.store')
            ->middleware('permission:relatorios.store');
        Route::get('/relatorios/{relatorio}', [RelatorioController::class, 'show']) //fazer os metodos de create, store, show, edit, update e destroy
            ->name('gerente.relatorios.show')
            ->middleware('permission:relatorios.show');
        Route::get('/relatorios/{relatorio}/edit', [RelatorioController::class, 'edit'])  //fazer os metodos de create, store, show, edit, update e destroy
            ->name('gerente.relatorios.edit')
            ->middleware('permission:relatorios.edit');
        Route::put('/relatorios/{relatorio}', [RelatorioController::class, 'update']) //fazer os metodos de create, store, show, edit, update e destroy
            ->name('gerente.relatorios.update')
            ->middleware('permission:relatorios.update');
        Route::delete('/relatorios/{relatorio}', [RelatorioController::class, 'destroy']) //fazer os metodos de create, store, show, edit, update e destroy
            ->name('gerente.relatorios.destroy')
            ->middleware('permission:relatorios.destroy');

        // RH Services
        Route::get('/rh-services', [RHServiceController::class, 'index'])
            ->name('gerente.rh-services.index')
            ->middleware('permission:rh-services.index');
        Route::get('/rh-services/create', [RHServiceController::class, 'create'])
            ->name('gerente.rh-services.create')
            ->middleware('permission:rh-services.create');
        Route::post('/rh-services', [RHServiceController::class, 'store'])
            ->name('gerente.rh-services.store')
            ->middleware('permission:rh-services.store');
        Route::get('/rh-services/{rhService}', [RHServiceController::class, 'show']) //fazer os metodos de create, store, show, edit, update e destroy
            ->name('gerente.rh-services.show')
            ->middleware('permission:rh-services.show');
        Route::get('/rh-services/{rhService}/edit', [RHServiceController::class, 'edit'])
            ->name('gerente.rh-services.edit')
            ->middleware('permission:rh-services.edit');
        Route::put('/rh-services/{rhService}', [RHServiceController::class, 'update'])
            ->name('gerente.rh-services.update')
            ->middleware('permission:rh-services.update');
        Route::delete('/rh-services/{rhService}', [RHServiceController::class, 'destroy'])
            ->name('gerente.rh-services.destroy')
            ->middleware('permission:rh-services.destroy');
    });
