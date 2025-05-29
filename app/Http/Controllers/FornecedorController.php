<?php

namespace App\Http\Controllers;

use App\Models\Fornecedores;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Controller responsável pelo gerenciamento de fornecedores.
     * Inclui funcionalidades de listagem, criação, edição, exclusão,
     *  busca e visualização de detalhes.
     * @return \Illuminate\View\View
     */

    public function index()
    {
        return view('fornecedores.index', [
            'fornecedores' => Fornecedores::latest()->get()
        ]);
    }
    public function create()
    {
        return view('fornecedores.create');
    }
    /**
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
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
    /**
     * Exibe o formulário de edição de um fornecedor.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $fornecedor = Fornecedores::findOrFail($id);
        return view('fornecedores.edit', compact('fornecedor'));
    }
    /**
     * Atualiza um fornecedor existente.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validação
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
    /**
     * Remove um fornecedor existente.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $fornecedor = Fornecedores::findOrFail($id);
        $fornecedor->delete();

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor removido com sucesso!');
    }
    /**
     * Exibe os detalhes de um fornecedor.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $fornecedor = Fornecedores::findOrFail($id);
        return view('fornecedores.show', compact('fornecedor'));
    }
    /**
     * Exibe o formulário de pesquisa de fornecedores.
     *
     * @return \Illuminate\View\View
     */
    public function search()
    {
        return view('fornecedores.search');
    }
    /**
     * Pesquisa fornecedores com base no nome.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function searchResults(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $fornecedores = Fornecedores::where('nome', 'like', '%' . $request->nome . '%')->get();

        return view('fornecedores.search_results', compact('fornecedores'));
    }
    /**
     * Exibe o formulário de importação de fornecedores.
     *
     * @return \Illuminate\View\View
     */

}
