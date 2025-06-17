<?php
namespace App\Http\Controllers\DashboardSupervisor2Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendasRequest;
use App\Services\VendasService;
use App\Models\Venda;
use Inertia\Inertia;

class VendasController extends Controller
{
    public function __construct(private VendasService $vendasService)
    {
        $this->middleware(['auth:sanctum', 'role:Supervisor2']);
    }
    public function index()
    {
        return Inertia::render('Supervisor2Page/vendas-index', [
           'vendas'=> $this->vendasService->getAll(),
            ]);
    }

    public function create()
    {
         return Inertia::render('Supervisor2Page/vendas-create');
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

        return redirect()->route('supervisor2.vendas.store')->with('success', 'Venda registrada com sucesso!');
    }

    public function show(int $id)
    {
        $venda = Venda::findOrFail($id);
        return Inertia::render('Supervisor2Page/vendas-show', [
            'venda' => $venda,forneced
        ]);
    }

    public function edit($id)
    {
       return Inertia::render('Supervisor2Page/vendas-edit', [
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

        return redirect()->route('supervisor2.vendas.update')->with('success', 'Venda atualizada com sucesso!');
    }

    public function destroy(int $id)
    {
        Venda::findOrFail($id)->delete();
        return redirect()->route('supervisor2.vendas.destroy')->with('success', 'Venda excluída com sucesso!');
    }
}
