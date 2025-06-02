<?php
namespace App\Http\Controllers;

use App\Http\Requests\VendasRequest;
use Inertia\Inertia;
use App\Models\Venda;

class VendasController extends Controller
{
    public function index()
    {
        return Inertia::render('Vendas/Index', [
            'vendas' => Venda::all(),
        ]);
    }

    public function create()
    {
         return Inertia::render('Vendas/Create');
    }

    public function store(VendasRequest $request)
    {
        $request->validate([
            'nome_cliente' => 'nullable|string|max:255',
            'date_venda' => 'required|date',
            'cpf_cliente' => 'nullable|string|max:14',
            'valor_total' => 'required|numeric|min:0',
        ]);

        Venda::create($request->all());

        return redirect()->route('vendas.index')->with('success', 'Venda registrada com sucesso!');
    }

    public function show(int $id)
    {
        $venda = Venda::findOrFail($id);
        return Inertia::render('Vendas/Show', [
            'venda' => $venda,
        ]);
    }

    public function edit($id)
    {
       return Inertia::render('Vendas/Edit', [
            'venda' => Venda::findOrFail($id),
        ]);
    }

    public function update(VendasRequest $request, $id)
    {
        $request->validate([
            'nome_cliente' => 'nullable|string|max:255',
            'date_venda' => 'required|date',
            'cpf_cliente' => 'nullable|string|max:14',
            'valor_total' => 'required|numeric|min:0',
        ]);

        $venda = Venda::findOrFail($id);
        $venda->update($request->all());

        return redirect()->route('vendas.index')->with('success', 'Venda atualizada com sucesso!');
    }

    public function destroy(int $id)
    {
        Venda::findOrFail($id)->delete();
        return redirect()->route('vendas.index')->with('success', 'Venda excluída com sucesso!');
    }
}
