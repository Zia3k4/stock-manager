<?php
namespace App\Http\Controllers\DashboardSupervisor2Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendasRequest;
use App\Services\VendasService;
use App\Models\Venda;

class VendasController extends Controller
{
    public function __construct(private VendasService $vendasService)
    {
        $this->middleware(['auth:sanctum', 'role:Supervisor2']);
    }

    public function index()
    {
        return view('supervisor2.vendas.index', [
            'vendas' => $this->vendasService->getAll(),
        ]);
    }

    public function create()
    {
        return view('supervisor2.vendas.create');
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

        return redirect()->route('supervisor2.vendas.index')->with('success', 'Venda registrada com sucesso!');
    }

    public function show(int $id)
    {
        $venda = Venda::findOrFail($id);
        return view('supervisor2.vendas.show', [
            'venda' => $venda,
        ]);
    }

    public function edit($id)
    {
        return view('supervisor2.vendas.edit', [
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

        return redirect()->route('supervisor2.vendas.index')->with('success', 'Venda atualizada com sucesso!');
    }

    public function destroy(int $id)
    {
        Venda::findOrFail($id)->delete();
        return redirect()->route('supervisor2.vendas.index')->with('success', 'Venda excluída com sucesso!');
    }
}
