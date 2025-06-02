<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstoqueRequest;
use App\Models\Estoque;
use App\Models\Produto;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
class EstoqueController extends Controller
{
    public function index()
    {
        return Inertia::render('Estoque/Index', [
           'estoque' => Estoque::latest()->get(),
        ]);
    }
    public function create()
    {
        return Inertia::render('Estoque/Create', [
            'produtos' => Produto::all(),
           // criar uma tabela de estoque depois
        ]);
    }

     public function store(EstoqueRequest $request): RedirectResponse
{
     Estoque::create($request->validated());
     return redirect()->route('estoque.index')->with('success', 'Movimentação de estoque registrada com sucesso!');

}
 public function show($id)
    {
        return Inertia::render('Estoque/Show', [
            'estoque' => Estoque::findOrFail($id),
        ]);
    }

    public function edit($id)
    {
        return Inertia::render('Estoque/Edit', [
            'estoque' => Estoque::findOrFail($id),
        ]);
    }

    public function update(EstoqueRequest $request, $id): RedirectResponse
    {
        $estoque = Estoque::findOrFail($id);
        $estoque->update($request->all());
        return redirect()->route('estoque.index')->with('success', 'Movimentação de estoque atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $estoque = Estoque::findOrFail($id);
        $estoque->delete();
        return redirect()->route('estoque.index')->with('success', 'Movimentação de estoque excluída com sucesso!');
    }

}
