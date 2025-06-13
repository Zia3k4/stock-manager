<?php

namespace App\Http\Controllers;
// use Laracasts\Flash\Flash;
use Inertia\Inertia;
use App\Http\Requests\ProdutosRequest;
use App\Services\ProdutoService;
use Illuminate\Http\RedirectResponse;
//Controller refatorado para usar o Inertia.js e o Service Pattern
class ProdutosController extends Controller
{
    protected ProdutoService $produtoService;
    public function __construct(ProdutoService $produtoService)
    {
        $this->produtoService = $produtoService;
    }
    public function index()
     {
       return Inertia::render('Produtos/Index', [
            'produtos' =>$this->produtoService->getAll(),
        ]);
     }
     public function create()
    {
        return Inertia::render('Produtos/Create');
    }

    public function store(ProdutosRequest $request)
    {
        $this->produtoService->create($request->validated());
        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }
    public function show($id)
    {
        return Inertia::render('Produtos/Show', [
            'produtos' => $this->produtoService->getById($id),
        ]);
    }
   public function edit($id)
   {
       return Inertia::render('Produtos/Edit', [
              'produtos' => $this->produtoService->getById($id),
        ]);
    }
    public function update(ProdutosRequest $request, $id)
    {   $request->validate([
        'descricao' => 'required|string|max:255',
        'preco' => 'required|numeric|min:0',
        'qtd_disponivel' => 'required|integer|min:0',
        'nota_fiscal' => 'required|string|max:255',
        'fornecedor_id' => 'required|exists:fornecedores,id',
    ]);
        $this->produtoService->update($id, $request->validated());
        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produtos): RedirectResponse
    {
        $this->produtoService->delete($produtos->id);
        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }

}
