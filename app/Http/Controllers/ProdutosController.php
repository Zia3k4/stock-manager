<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use Laracasts\Flash\Flash;
use Inertia\Inertia;
use App\Http\Requests\ProdutosRequest;

class ProdutosController extends Controller
{
    public function index()
     {
       return Inertia::render('Produtos/Index', [
            'produtos' => Produto::latest()->get(),
        ]);
     }
     public function create()
    {
        return Inertia::render('Produtos/Create');
    }

    public function store(ProdutosRequest $request)
    {
        $request->validate([
        'descricao' => 'required|string|max:255',
        'preco' => 'required|numeric|min:0',
        'qtd_disponivel' => 'required|integer|min:0',
        'nota_fiscal' => 'required|string|max:255',
        'fornecedor_id' => 'required|exists:fornecedores,id',
    ]);

    $produtos = new Produto();

    $produtos->descricao = $request->descricao;
    $produtos->preco = $request->preco;
    $produtos->qtd_disponivel = $request->qtd_disponivel;
    $produtos->nota_fiscal = $request->nota_fiscal;
    $produtos->fornecedor_id = $request->fornecedor_id;

    $produtos->save();

    session()->flash('success', 'Produto criado com sucesso!');

    return back();
    }
    public function show($id)
    {
        return Inertia::render('Produtos/Show', [
            'produtos' => Produto::findOrFail($id),
            // Supondo que você tenha um modelo Fornecedor
        ]);
    }
    /**
     * Exibe o formulário de edição de um produto.
     */
   public function edit($id)
   {
       return Inertia::render('Produtos/Edit', [
              'produtos' => Produto::findOrFail($id),
               // Supondo que você tenha um modelo Fornecedor
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
        $produtos = Produto::findOrFail($id);
        $produtos->update($request->all());

        Flash::success('Produto atualizado com sucesso!');

        return redirect()->route('produtos.index');
    }

    public function destroy(Produto $produtos)
    {
        $produtos->delete();

        return redirect()->route('products.index')->with('success', 'Produto removido!');
    }

}
