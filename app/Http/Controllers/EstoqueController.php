<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstoqueRequest;
use App\Services\EstoqueService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
class EstoqueController extends Controller
{  protected EstoqueService $estoqueService;
    public function __construct(EstoqueService $estoqueService)
    {
    $this->estoqueService = $estoqueService;
    }
    public function index()
    {
        return Inertia::render('Estoque/Index', [
           'estoque' => $this->estoqueService->getAll(),
        ]);
    }
    public function create()
    {
        return Inertia::render('Estoque/Create');
    }
     public function store(EstoqueRequest $request): RedirectResponse
{
    $this->estoqueService->create($request->validated());
    return redirect()->route('estoque.index')->with('success', 'Movimentação de estoque criada com sucesso!');

}
 public function show($id)
    {
        return Inertia::render('Estoque/Show', [
            'estoque' => $this->estoqueService->getById($id),
        ]);
    }

    public function edit($id)
    {
        return Inertia::render('Estoque/Edit', [
            'estoque' => $this->estoqueService->getById($id),
        ]);
    }

    public function update(EstoqueRequest $request, $id): RedirectResponse
    {
       $request->validate([
           'id' => 'required|exists:estoques,id',
           'descricao' => 'required|string|max:255',
           'lote' => 'required|string|max:255',
           'preco_unitario' => 'required|numeric|min:0',

       ]);
        $this->estoqueService->update($id, $request->validated());
        return redirect()->route('estoque.index')->with('success', 'Movimentação de estoque atualizada com sucesso!');
    }

    public function destroy($id): RedirectResponse
    {
        $this->estoqueService->delete($id);
        return redirect()->route('estoque.index')->with('success', 'Movimentação de estoque excluída com sucesso!');
    }

}
