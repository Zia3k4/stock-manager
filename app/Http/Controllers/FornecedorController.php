<?php

namespace App\Http\Controllers;

use App\Http\Requests\FornecedoresRequest;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
use App\Services\FornecedorService;

//controller refatorado para usar o Inertia.js e o Service Pattern
class FornecedorController extends Controller
{
    protected FornecedorService $fornecedoresService;
    public function __construct(FornecedorService $fornecedoresService)
    {
        $this->fornecedoresService = $fornecedoresService;
    }
    public function index()
    {
        return Inertia::render('Fornecedores/Index', [
             'fornecedores' => $this->fornecedoresService->getAll(),
        ]);
    }
    public function create()
    {
       return Inertia::render('Fornecedores/Create');
    }

    public function store(FornecedoresRequest $request)
    {
        $this->fornecedoresService->create($request->validated());
        return redirect()->route('Fornecedores.index')->with('success', 'Fornecedor criado com sucesso!');
    }

    public function show($id)
    {
     return Inertia::render('Fornecedores/Show', [
            'fornecedor' => $this->fornecedoresService->getById($id),
        ]);
    }

    public function edit(int $id)
    {
      return Inertia::render('Fornecedores/Edit', [
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
        return redirect()->route('Fornecedores.index')->with('success', 'Fornecedor atualizado com sucesso!');
    }
    public function destroy($id):RedirectResponse
    {
        $this->fornecedoresService->delete($id);
        return redirect()->route('Fornecedores.index')->with('success', 'Fornecedor excluído com sucesso!');
    }

}
