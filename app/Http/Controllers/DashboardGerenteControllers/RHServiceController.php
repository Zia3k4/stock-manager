<?php

namespace App\Http\Controllers\DashboardGerenteControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RhServiceRequest;
use App\Services\RhServiceService;

class RHServiceController extends Controller
{
    public function __construct(private RhServiceService $rhServiceService){
        $this->middleware(['auth', 'role:Gerente']);
    }

    public function index()
    {
        return view('gerente.rhservice.index', [
            'registros' => $this->rhServiceService->getAll(),
        ]);
    }

    public function create()
    {
        return view('gerente.rhservice.create');
    }

    public function store(RhServiceRequest $request)
    {
        $request->validate([
            'funcionario_id' => 'required|exists:funcionarios,id',
            'data' => 'required|date',
            'hora_chegada' => 'nullable|date_format:H:i',
            'hora_saida' => 'nullable|date_format:H:i',
            'horas_trabalhadas' => 'nullable|numeric|min:0',
            'atraso' => 'nullable|numeric|min:0',
            'saida_antecipada' => 'nullable|numeric|min:0',
            'observacoes' => 'nullable|string',
        ]);

        $this->rhServiceService->create($request->validated());
        return redirect()->route('frequencia.index')->with('success', 'Registro de frequência salvo com sucesso!');
    }

    public function edit(int $id)
    {
        return view('gerente.rhservice.edit', [
            'registro' => $this->rhServiceService->getById($id),
        ]);
    }

    public function update(RhServiceRequest $request, $id)
    {
        $request->validate([
            'funcionario_id' => 'required|exists:funcionarios,id',
            'data' => 'required|date',
            'hora_chegada' => 'nullable|date_format:H:i',
            'hora_saida' => 'nullable|date_format:H:i',
            'horas_trabalhadas' => 'nullable|numeric|min:0',
            'atraso' => 'nullable|numeric|min:0',
            'saida_antecipada' => 'nullable|numeric|min:0',
            'observacoes' => 'nullable|string',
        ]);

        $this->rhServiceService->update($id, $request->validated());
        return redirect()->route('gerente.rhservice.rhservice.update')->with('success', 'Registro de frequência atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $this->rhServiceService->delete($id);
        return redirect()->route('gerente.funcionarios.destroy')->with('success', 'Registro de frequência excluído com sucesso!');
    }
}
