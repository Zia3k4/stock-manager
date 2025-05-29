<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Produto;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{   // fazer a migration de estoque e refazer depois o model de estoque
    public function index()
    {
        return view('estoque.index', [
            'produtos' => Produto::latest()->get()
        ]);
    }
    public function create()
    {
        return view('estoque.create');
    }

     public function store(Request $request)
{
    // Validação dos dados recebidos
    $request->validate([
        'produto_id' => 'required|exists:produtos,id',
        'tipo_movimentacao' => 'required|in:entrada,saida',
        'quantidade' => 'required|integer|min:1',
        'observacao' => 'nullable|string',
    ]);

    // Criação do registro de movimentação no estoque
    DB::transaction(function () use ($request) {
        // Registrar a movimentação
        \App\Models\Estoque::create([
            'produto_id' => $request->produto_id,
            'tipo_movimentacao' => $request->tipo_movimentacao,
            'quantidade' => $request->quantidade,
            'observacao' => $request->observacao,
        ]);

        // Atualizar a quantidade disponível no produto
        $produto = Produto::findOrFail($request->produto_id);

        if ($request->tipo_movimentacao === 'entrada') {
            $produto->qtd_disponivel += $request->quantidade;
        } elseif ($request->tipo_movimentacao === 'saida') {
            if ($produto->qtd_disponivel < $request->quantidade) {
                throw new \Exception('Quantidade insuficiente em estoque.');
            }
            $produto->qtd_disponivel -= $request->quantidade;
        }

        $produto->save();
    });

    // Mensagem de sucesso
    session()->flash('success', 'Movimentação de estoque registrada com sucesso!');

    return back();
}
 public function show($id)
    {
        $estoque = \App\Models\Estoque::findOrFail($id);
        return view('estoque.show', compact('estoque'));
    }

    public function edit($id)
    {
        $estoque = \App\Models\Estoque::findOrFail($id);
        return view('estoque.edit', compact('estoque'));
    }

    public function update(Request $request, $id)
    {
        $estoque = \App\Models\Estoque::findOrFail($id);
        $estoque->update($request->all());
        return redirect()->route('estoque.index')->with('success', 'Movimentação de estoque atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $estoque = \App\Models\Estoque::findOrFail($id);
        $estoque->delete();
        return redirect()->route('estoque.index')->with('success', 'Movimentação de estoque excluída com sucesso!');
    }

}
