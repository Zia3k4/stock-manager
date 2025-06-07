<?php

namespace App\Http\Controllers;

use App\Http\Requests\FornecedoresRequest;
use App\Models\Fornecedores;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
//revisado 1
class FornecedorController extends Controller
{
    public function index()
    {
        return Inertia::render('Fornecedores/Index', [
            'fornecedores' => Fornecedores::all(),
            'success' => session('success'),
            'error' => session('error'),
        ]);
    }
    public function create()
    {
       return Inertia::render('Fornecedores/Create');
    }

    public function store(FornecedoresRequest $request)
    {
        // Validação
        $request->validate([
        'nome' => 'required|string|max:255',
        'cnpj' => 'required|string|max:18',
        'endereco' => 'nullable|string|max:255',
        'cep' => 'nullable|string|max:9',
        'contato' => 'nullable|string|max:255',
        ]);

        $fornecedor = new Fornecedores();

       $fornecedor->nome = $request->nome;
       $fornecedor->cnpj = $request->cnpj;
       $fornecedor->endereco = $request->endereco;
       $fornecedor->cep = $request->cep;
       $fornecedor->contato = $request->contato;


        $fornecedor->save();
        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor cadastrado com sucesso!');
    }

    public function show($id)
    {
     return Inertia::render('Fornecedores/Show', [
            'fornecedor' => Fornecedores::findOrFail($id),
        ]);
    }

    public function edit(int $id)
    {
      return Inertia::render('Fornecedores/Edit', [
            'fornecedor' => Fornecedores::findOrFail($id),
        ]);
    }
      public function update(FornecedoresRequest $request, $id)
    {
        // Validação, atualiaza fornecedor existente
        $request->validate([
        'nome' => 'required|string|max:255',
        'cnpj' => 'required|string|max:18',
        'endereco' => 'nullable|string|max:255',
        'cep' => 'nullable|string|max:9',
        'contato' => 'nullable|string|max:255',
        ]);

        $fornecedor = Fornecedores::findOrFail($id);
        $fornecedor->nome = $request->nome;
        $fornecedor->cnpj = $request->cnpj;
        $fornecedor->endereco = $request->endereco;
        $fornecedor->cep = $request->cep;
        $fornecedor->contato = $request->contato;


        $fornecedor->save();

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor atualizado com sucesso!');
    }
    public function destroy($id):RedirectResponse
    {
        $fornecedor = Fornecedores::findOrFail($id);
        $fornecedor->delete();

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor removido com sucesso!');
    }

}
