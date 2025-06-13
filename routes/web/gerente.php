                                               ### EXEMPLO DE ROTAS PARA GERENTE, SUPERVISOR1 E SUPERVISOR2 ####
 * use Illuminate\Support\Facades\Route;
 * use App\Http\Controllers\GerenteController;
 * use App\Http\Controllers\Supervisor1Controller;
 * use App\Http\Controllers\Supervisor2Controller;
 * use App\Http\Controllers\FuncionarioController;
 * use App\Http\Controllers\UsuarioController;
 * use App\Http\Controllers\RHServiceController;
 * use App\Http\Controllers\EstoqueController;
 * use App\Http\Controllers\FornecedorController;
 * use App\Http\Controllers\ProdutosController;
 * //lembre-se o gerente é o admin, ele pode ter acesso a todas as rotas
 *
 * Route::middleware(['auth', 'permission:dashboard.gerente'])->prefix('gerente')->name('gerente.')->group(function () {
 *     Route::get('/dashboard', [GerenteController::class, 'index'])->name('dashboard');
 *
 *     Route::get('/relatorios', [GerenteController::class, 'relatorios'])->middleware('permission:relatorios.ver')->name('relatorios');
 *     Route::get('/relatorios/exportar', [GerenteController::class, 'exportar'])->middleware('permission:relatorios.exportar')->name('relatorios.exportar');
 *
 *     Route::resource('/funcionarios', FuncionarioController::class)->middleware([
 *         'permission:funcionarios.index|funcionarios.create|funcionarios.edit|funcionarios.delete|funcionarios.show'
 *     ]);
 *
 *     Route::resource('/usuarios', UsuarioController::class)->middleware([
 *         'permission:usuarios.index|usuarios.create|usuarios.edit|usuarios.delete|usuarios.show'
 *     ]);
 *
 *     Route::get('/rhservice', [RHServiceController::class, 'index'])->middleware('permission:rhservice.index')->name('rh.index');
 *     Route::get('/rhservice/create', [RHServiceController::class, 'create'])->middleware('permission:rhservice.create')->name('rh.create');
 *     Route::get('/rhservice/{id}', [RHServiceController::class, 'show'])->middleware('permission:rhservice.show')->name('rh.show');
 *     Route::get('/rhservice/{id}/edit', [RHServiceController::class, 'edit'])->middleware('permission:rhservice.edit')->name('rh.edit');
 *
 *     // Acesso às visões dos supervisores
 *     Route::get('/supervisor1', [Supervisor1Controller::class, 'index'])->name('supervisor1.dashboard');
 *     Route::get('/supervisor2', [Supervisor2Controller::class, 'index'])->name('supervisor2.dashboard');
 * });
 * //este arquivo nao pressta, so um planejamento de rotas, depois eu vejo como fazer as chamadas de cada controller
 */
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 Route::middleware(['auth:sanctum'])->prefix('dashboard')->name('dashboard.')->group(function () {
 Route::middleware(['permission:dashboard.gerente'])->prefix('gerente')->name('gerente.')->group(function () {
 Route::get('/', [ProfileController::class, 'index'])->name('index');
 });
 Route::get('/relatorio', [RelatorioController::class, 'index'])->name('relatorio');
 });
 ///////////////////////
 Route::middleware(['auth:sanctum', 'role:Gerente'])->prefix('gerente')->name('gerente.')->group(function () {
     Route::get('/dashboard', [GerenteController::class, 'index'])->name('dashboard');

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
.////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 Route::middleware(['auth:sanctum', 'role:Supervisor1'])->prefix('supervisor1')->name('supervisor1.')->group(function () {
     Route::get('/dashboard/supervisor1', [Supervisor1Controller::class, 'index'])->name('dashboard');  ### colocar o nome do controller correto e odiretorio do dashboard do supervisopr

     Route::resource('/fornecedores', FornecedorController::class)->middleware([
         'permission:fornecedores.index|fornecedores.create|fornecedores.edit|fornecedores.delete|fornecedores.show'
     ]);
 });
 //////////////////////////////////////////////////////////////////////////////////////////////////////////
 Route::middleware(['auth:sanctum', 'role:Supervisor2'])->prefix('supervisor2')->name('supervisor2.')->group(function () {
     Route::get('/dashboard/supervisor1', [Supervisor2Controller::class, 'index'])->name('dashboardsupervisor2');  ### colocar o nome do controller correto e odiretorio do dashboard do supervisopr

     Route::resource('/estoque', EstoqueController::class)->middleware([
         'permission:estoque.index|estoque.create|estoque.edit|estoque.delete|estoque.show'
     ]);

     Route::resource('/produtos', ProdutosController::class)->middleware([
         'permission:produtos.index|produtos.create|produtos.edit|produtos.delete|produtos.show'
     ]);
 });
