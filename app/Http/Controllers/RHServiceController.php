<?php

namespace App\Http\Controllers;

use App\Models\registro_frequencia;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class RHServiceController extends Controller
{
     /**
     * registrar o serviço de RH
     * registrar ponto de serviço
     * situacoes dos funcionarios , ferias, atestados, etc
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('rhservice.index', ['registro_frequencia' => registro_frequencia::latest()->get()
    ]);

    }
     public function create(){
        return view('rhservice.create');
     }
    public function store(Request $request)
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
        return view('rhservice.edit', compact('registro'));
     }
     public function update(Request $request, $id)
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
        public function buscarRegistro(Request $request)
        {
           $codigo = $request->input('codigo');
           $registro = registro_frequencia::where('codigo', $codigo)->first();

           if ($registro) {
               return response()->json($registro);
           } else {
               return response()->json(['message' => 'Registro não encontrado'], 404);
           }
        }
   }
