<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\registro_frequencia;
use App\Http\Requests\RhServiceRequest;
use Inertia\Inertia;
// revisar depois se esta de acordo com o model
class RHServiceController extends Controller
{

    public function index()
    {
        return Inertia::render('RhServiceService/Index', [
            'registro_frequencia' => registro_frequencia::latest()->get(),
            'success' => session('success'),
            'error' => session('error'),
        ]);


    }
     public function create(){
        return Inertia::render('RhServiceService/Create', [
            'funcionarios' => Funcionario::all(), // Certifique-se de que o modelo Funcionario está correto
        ]);
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

    // Criação do registro
    $registro = new registro_frequencia(); // ou App\Models\registro_frequencia, se seguir a convenção do nome original

    $registro->funcionario_id = $request->funcionario_id;
    $registro->data = $request->data;
    $registro->hora_chegada = $request->hora_chegada;
    $registro->hora_saida = $request->hora_saida;
    $registro->horas_trabalhadas = $request->horas_trabalhadas;
    $registro->atraso = $request->atraso;
    $registro->saida_antecipada = $request->saida_antecipada;
    $registro->observacoes = $request->observacoes;

    $registro->save();

    return redirect()->route('frequencia.index')->with('success', 'Registro de frequência salvo com sucesso!');
}

     public function edit($id)
     {
        $registro = registro_frequencia::findOrFail($id);
       return Inertia::render('RhServiceService/Edit', [
            'registro' => $registro,
            'funcionarios' => Funcionario::all(), // Certifique-se de que o modelo Funcionario está correto
        ]);
     }
     public function update(RhServiceRequest $request, $id)
     {
         $registro = registro_frequencia::findOrFail($id);
         $registro->update($request->all());
         return redirect()->route('rh.index')->with('success', 'Serviço de RH atualizado com sucesso!');
     }
     public function destroy($id)
     {
        $registro = registro_frequencia::findOrFail($id);
        $registro->delete();
        return redirect()->route('rh.index')->with('success', 'Serviço de RH excluído com sucesso!');
     }

   }
