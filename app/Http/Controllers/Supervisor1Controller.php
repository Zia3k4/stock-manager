<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Supervisor1Controller extends Controller
{  /**
        * Exibe a página inicial do supervisor 1.
        *e suas funcionalidades
        *este controler ira se relacionar com outros *controllers
        */


    public function index()
    {
        return view('supervisor1.index');
    }
    public function show()
    {
        return view('supervisor1.show');
    }
    public function create()
    {
        return view('supervisor1.create');
    }
    public function edit()
    {
        return view('supervisor1.edit');
    }
    public function destroy()
    {
        return view('supervisor1.destroy');
    }
    public function store(Request $request)
    {
        // Lógica para armazenar os dados do formulário
        // Você pode usar o modelo correspondente para salvar os dados no banco de dados
        return redirect()->route('supervisor1.index')->with('success', 'Dados armazenados com sucesso!');
    }
}
