<?php

namespace App\Http\Controllers\DashboardSupervisor2Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Http\Requests\ProdutosRequest;
use App\Services\ProdutoService;
use Illuminate\Http\RedirectResponse;

class ProdutosController extends Controller
{
    public function __construct(private ProdutoService $produtoService)
    {
        $this->middleware(['auth:sanctum', 'role:Supervisor2']);
    }

    public function index()
    {
        return view('supervisor2.produtos.index', [
            'produtos' => $this->produtoService->getAll(),
        ]);
    }

    public function create()
    {
        return view('supervisor2.produtos.create');
    }

    public function store(ProdutosRequest $request)
    {
        $this->produtoService->create($request->validated());
        return redirect()->route('produtos.edit')->with('success', 'Produto criado com sucesso!');
    }

    public function show($id)
    {
        return view('supervisor2.produtos.show', [
            'produtos' => $this->produtoService->getById($id),
        ]);
    }

    public function edit($id)
    {
        return view('supervisor2.produtos.edit', [
            'produtos' => $this->produtoService->getById($id),
        ]);
    }

    public function update(ProdutosRequest $request, $id)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'qtd_disponivel' => 'required|integer|min:0',
            'nota_fiscal' => 'required|string|max:255',
            'fornecedor_id' => 'required|exists:fornecedores,id',
        ]);
        $this->produtoService->update($id, $request->validated());
        return redirect()->route('supervisor2.produtos.edit')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produtos): RedirectResponse
    {
        $this->produtoService->delete($produtos->id);
        return redirect()->route('supervisor2.produtos.destroy')->with('success', 'Produto excluído com sucesso!');
    }
}
