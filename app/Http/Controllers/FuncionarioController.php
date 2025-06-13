<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncionarioRequest;
use App\Services\FuncionarioService;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

//  controller refatorado para usar o Inertia.js e o Service Pattern

class FuncionarioController extends Controller
{
    public function __construct(private FuncionarioService $service)
    {
        $this->middleware(['auth:sanctum', 'role:Gerente']);
    }

    public function index()
    {
    return Inertia::render('Funcionarios/Index', [
     'funcionarios'=>$this->service->getAll(),

        // dd(auth()->user()->getAllPermissions()->pluck('name'));
       ]);

    }
    public function create()
    {
        return Inertia::render('Funcionarios/Create');
    }
    public function store(FuncionarioRequest $request): RedirectResponse
    {
        $this->service->create($request->validated());
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário criado com sucesso!');

    }

    public function show(int $id)
    {
        return Inertia::render('Funcionarios/Show', [
            'funcionario' => $this->service->getById($id),
        ]);
    }
    public function edit(int $id)
    {

        return Inertia::render('Funcionarios/Edit', [
            'funcionario'=>$this->service->getById($id),
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

        $this->service->update($id, $request->all());
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->service->delete($id);
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário excluído com sucesso!');
    }
}
