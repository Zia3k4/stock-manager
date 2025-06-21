<?php

namespace App\Http\Controllers\DashboardSupervisor2Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EstoqueRequest;
use App\Services\EstoqueService;
use Illuminate\Http\RedirectResponse;

class EstoqueController extends Controller
{
    public function __construct(private EstoqueService $estoqueService)
    {
        $this->middleware(['auth:sanctum', 'role:Supervisor2']);
    }

    public function index()
    {
        return view('supervisor2.estoque.index', [
            'estoque' => $this->estoqueService->getAll(),
        ]);
    }

    public function create()
    {
        return view('supervisor2.estoque.create');
    }

    public function store(EstoqueRequest $request): RedirectResponse
    {
        $this->estoqueService->create($request->validated());
        return redirect()->route('supervisor2.estoque.index')->with('success', 'Movimentação de estoque criada com sucesso!');
    }

    public function show($id)
    {
        return view('supervisor2.estoque.show', [
            'estoque' => $this->estoqueService->getById($id),
        ]);
    }

    public function edit($id)
    {
        return view('supervisor2.estoque.edit', [
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
        return redirect()->route('supervisor2.estoque.edit', $id)->with('success', 'Movimentação de estoque atualizada com sucesso!');
    }

    public function destroy($id): RedirectResponse
    {
        $this->estoqueService->delete($id);
        return redirect()->route('supervisor2.estoque.index')->with('success', 'Movimentação de estoque excluída com sucesso!');
    }
}
