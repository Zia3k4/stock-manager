<?php

namespace App\Http\Controllers;
use App\Models\produto;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Produtos;
use Laracasts\Flash\Flash;
use Inertia\Inertia;
//depois eu vejo se é necessario usar essa model aqui e configuarar as chamadas das variaveis


class ProdutosController extends Controller
{    /**
    * Exibe a lista de produtos.
    *
    * @return \Illuminate\View\View
    */
    public function index()
     {
    return view('produtos.index', [
        'produtos' => Produto::latest()->get()
    ]);
    //public function index()
    /**
     *  @return \Illuminate\Http\Response
     *
     */
     }
     public function create()
    {
        return view('produtos.create');
    }

     /**
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function store(Request $request)
    {
        //validacao
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
    public function buscarproduto(Request $request)
    {
        $codigo=$request -> input('');
        $produtos=$request->input();
        return response()->json($produtos);
    }
    public function show($id)
    {
        $produtos = Produto::findOrFail($id);

        return Inertia::render('Produtos/Show', [
            'produto' => $produtos
        ]);
    }
    /**
     * Exibe o formulário de edição de um produto.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
   public function edit($id)
   {
     $produtos = Produto::findOrFail($id);

     return view('produtos.edit', [
        'produto' => $produtos
      ]);
    }
    public function update(Request $request, $id)
    {
        $produtos = Produto::findOrFail($id);

        $produtos->update($request->all());

        Flash::success('Produto atualizado com sucesso!');

        return redirect()->route('produtos.index');
    }

    public function destroy(Produto $produtos)
    {
        $produtos->delete();

        return redirect()->route('products.index')->with('success', 'Produto removido.');
    }

}
