<?php
namespace App\Http\Controllers;

use App\Models\Venda;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    public function index()
    {
        return view('vendas.index', [
            'vendas' => Venda::latest('data_venda')->get()
        ]);
    }

    public function create()
    {
        return view('vendas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_cliente' => 'nullable|string|max:255',
            'cpf_cliente' => 'nullable|string|max:14',
            'valor_total' => 'required|numeric|min:0',
        ]);

        Venda::create($request->all());

        return redirect()->route('vendas.index')->with('success', 'Venda registrada com sucesso!');
    }

    public function show($id)
    {
        $venda = Venda::findOrFail($id);
        return view('vendas.show', compact('venda'));
    }

    public function edit($id)
    {
        $venda = Venda::findOrFail($id);
        return view('vendas.edit', compact('venda'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_cliente' => 'nullable|string|max:255',
            'cpf_cliente' => 'nullable|string|max:14',
            'valor_total' => 'required|numeric|min:0',
        ]);

        $venda = Venda::findOrFail($id);
        $venda->update($request->all());

        return redirect()->route('vendas.index')->with('success', 'Venda atualizada com sucesso!');
    }

    public function destroy($id)
    {
        Venda::findOrFail($id)->delete();
        return redirect()->route('vendas.index')->with('success', 'Venda excluída com sucesso!');
    }
}
