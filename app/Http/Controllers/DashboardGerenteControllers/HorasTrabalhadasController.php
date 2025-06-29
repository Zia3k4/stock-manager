<?php

namespace App\Http\Controllers\DashboardGerenteControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\HorasTrabalhadasRequest;
use App\Services\HorasTrabalhadasService;
use Illuminate\Http\RedirectResponse;

class HorasTrabalhadasController extends Controller
{
    public function __construct(private HorasTrabalhadasService $horasTrabalhadasService)
    {
        $this->middleware(['auth:sanctum', 'role:Gerente']);
    }

    public function index()
    {
        return view('gerente.ht-index', [
            'horasTrabalhadas' => $this->horasTrabalhadasService->getAll(),
        ]);
    }

    public function create()
    {
        return view('gerente.ht-create');
    }

    public function store(HorasTrabalhadasRequest $request): RedirectResponse
    {
        $this->horasTrabalhadasService->create($request->validated());
        return redirect()->route('horasTrabalhadas.index')
            ->with('success', 'Horas trabalhadas criadas com sucesso!');
    }

    public function show(int $id)
    {
        return view('gerente.ht-show', [
            'horasTrabalhada' => $this->horasTrabalhadasService->getById($id),
        ]);
    }

    public function edit(int $id)
    {
        return view('gerente.ht-edit', [
            'horasTrabalhada' => $this->horasTrabalhadasService->getById($id),
        ]);
    }

    public function update(HorasTrabalhadasRequest $request, $id): RedirectResponse
    {
        $request->validate([
            'funcionario_id' => 'required|exists:funcionarios,id',
            'data' => 'required|date',
            'horas_trabalhadas' => 'required|numeric|min:0',
        ]);

        $this->horasTrabalhadasService->update($id, $request->validated());
        return redirect()->route('horasTrabalhadas.index')
            ->with('success', 'Horas trabalhadas atualizadas com sucesso!');
    }

    public function destroy($id): RedirectResponse
    {
        $this->horasTrabalhadasService->delete($id);
        return redirect()->route('horasTrabalhadas.index')
            ->with('success', 'Horas trabalhadas excluídas com sucesso!');
    }
}
