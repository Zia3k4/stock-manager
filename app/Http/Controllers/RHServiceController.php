<?php

namespace App\Http\Controllers;

use App\Http\Requests\RhServiceRequest;
use App\Services\RhServiceService;
use Inertia\Inertia;
// revisar depois se esta de acordo com o model
class RHServiceController extends Controller
{
    protected RhServiceService $rhServiceService;
    public function index()
    {
        return Inertia::render('RhServiceService/Index', [
            'registros'=>$this->rhServiceService->getAll(),
        ]);


    }
     public function create(){
        return Inertia::render('RhServiceService/Create');

     }
    public function store(RhServiceRequest $request)
{
    // Validação dos campos conforme a estrutura da tabela
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
        return Inertia::render('RhServiceService/Edit', [
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
        return redirect()->route('frequencia.index')->with('success', 'Registro de frequência atualizado com sucesso!');
     }
     public function destroy($id)
     {
        $this->rhServiceService->delete($id);
        return redirect()->route('frequencia.index')->with('success', 'Registro de frequência excluído com sucesso!');
     }

   }
