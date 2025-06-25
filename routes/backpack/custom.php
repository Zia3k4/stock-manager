<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('funcionarios', 'FuncionariosCrudController');
    Route::crud('estoque', 'EstoqueCrudController');
    Route::crud('fornecedores', 'FornecedoresCrudController');
    Route::crud('funcionario', 'FuncionarioCrudController');
    Route::crud('horas-trabalhada', 'HorasTrabalhadaCrudController');
    Route::crud('itens-venda', 'ItensVendaCrudController');
 // Route::crud('job-batch', 'JobBatchCrudController');
  //  Route::crud('model-has-permission', 'ModelHasPermissionCrudController');
 //   Route::crud('model-has-role', 'ModelHasRoleCrudController');
  //  Route::crud('permission', 'PermissionCrudController');
    Route::crud('produto', 'ProdutoCrudController');
 //   Route::crud('role', 'RoleCrudController');
   // Route::crud('role-has-permission', 'RoleHasPermissionCrudController');
    Route::crud('user', 'UserCrudController');
    Route::crud('venda', 'VendaCrudController');
    Route::crud('registro-frequencia', 'RegistroFrequenciaCrudController');
}); // this should be the absolute last line of this file

/**
 * DO NOT ADD ANYTHING HERE.
 */
