<?php

namespace App\Http\Controllers\DashboardSupervisor1Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FornecedoresRequest;
use App\Services\FornecedorService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

//controller refatorado para usar o Inertia.js e o Service Pattern
class FornecedorController extends Controller
{
    public function __construct(private FornecedorService $fornecedoresService)
    {
$this->middleware(['auth:sanctum',  'role:Supervisor1']);
    }
    public function index()
    {
        return Inertia::render('Supervisor1Page/fornecedores-index', [
             'fornecedores' => $this->fornecedoresService->getAll(),
        ]);
    }
    public function create()
    {
       return Inertia::render('Supervisor1Page/fornecedores-create');
    }

    public function store(FornecedoresRequest $request)
    {
        $this->fornecedoresService->create($request->validated());
        return redirect()->route('Fornecedores.index')->with('success', 'Fornecedor criado com sucesso!');
    }

    public function show($id)
    {
     return Inertia::render('Supervisor1Page/fornecedores-show', [
            'fornecedor' => $this->fornecedoresService->getById($id),
        ]);
    }

    public function edit(int $id)
    {
      return Inertia::render('Supervisor1Page/fornecedores-edit', [
            'fornecedor' =>$this->fornecedoresService->getById($id),
        ]);
    }
      public function update(FornecedoresRequest $request, $id)
    {
        // Validação, atualiaza fornecedor existente
        $request->validate([
        'nome' => 'required|string|max:255',
        'cnpj' => 'required|string|max:18',
        'endereco' => 'nullable|string|max:255',
        'cep' => 'nullable|string|max:9',
        'contato' => 'nullable|string|max:255',
        ]);

        $this->fornecedoresService->update($id, $request->validated());
        return redirect()->route('supervisor1.fornecedores.update')->with('success', 'Fornecedor atualizado com sucesso!');
    }
    public function destroy($id):RedirectResponse
    {
        $this->fornecedoresService->delete($id);
        return redirect()->route('supervisor2.vendas.destroy')->with('success', 'Fornecedor excluído com sucesso!');
    }

}
