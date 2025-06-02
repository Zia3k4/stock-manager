<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncionarioRequest;
use Illuminate\Validation\Rule;
use App\Models\Funcionario;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
class FuncionarioController extends Controller
{

    public function index()
    {
       return Inertia::render('Funcionarios/Index', [
            'funcionarios' => Funcionario::latest()->get(),
        ]);
    }
    public function create()
    {
        return Inertia::render('Funcionarios/Create');
    }
    public function store(FuncionarioRequest $request): RedirectResponse
    {
        Funcionario::create($request->validated());
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário criado com sucesso!');

    }

    public function show(int $id)
    {

        return Inertia::render('Funcionarios/Show', [
            'funcionario' => Funcionario::findOrFail($id),
        ]);
    }
    public function edit(int $id)
    {

        return Inertia::render('Funcionarios/Edit', [
            'funcionario' => Funcionario::findOrFail($id),
        ]);
    }

    public function update(FuncionarioRequest $request, int $id): RedirectResponse
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'salario' => 'required|numeric|min:0',
            'cpf' => ['required', 'string', 'max:14', Rule::unique('funcionarios', 'cpf')->ignore($id)],
            'rg' => ['required', 'string', 'max:12', Rule::unique('funcionarios', 'rg')->ignore($id)],
            'endereco' => 'nullable|string|max:255',
            'cep' => 'nullable|string|max:9',
            'telefone' => 'required|string|max:13',
            'email' => ['required', 'email', 'max:255', Rule::unique('funcionarios', 'email')->ignore($id)],
        ]);

        $funcionario = Funcionario::findOrFail($id);
        $funcionario->update($request->all());

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->delete();

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário excluído com sucesso!');
    }
}
