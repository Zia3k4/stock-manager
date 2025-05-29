<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

use App\Services\RHService;
use App\Models\Funcionario;
//revisar
class FuncionarioController extends Controller
{
        //public function index()
    /**
     *  @return \Illuminate\Http\Response
     *
     */
        public function index()
    {
        $funcionarios = Funcionario::orderBy('created_at', 'DESC')->get();
        return response(view('funcionarios.index', compact('funcionarios')));
    }
    public function create()
    {
        return view('funcionarios.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'salario' => 'required|numeric|min:0',
            //mais campos podem ser adicionados conforme necessário
        ]);

        Funcionario::create($request->all());

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário criado com sucesso!');
    }
    public function show($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('funcionarios.show', compact('funcionario'));
    }
    public function edit($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('funcionarios.edit', compact('funcionario'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'salario' => 'required|numeric|min:0',
            //mais campos podem ser adicionados conforme necessário
        ]);

        $funcionario = Funcionario::findOrFail($id);
        $funcionario->update($request->all());

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso!');
    }
    public function mostrarSalario($id, RHService $rhService)
    {
        $salario = $rhService->calcularSalario($id);
        return view('funcionarios.salario', compact('salario'));
    }
    public function destroy($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->delete();

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário excluído com sucesso!');
    }

}

