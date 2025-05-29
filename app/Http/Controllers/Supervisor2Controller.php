<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class Supervisor2Controller extends Controller
{

    /**
     * controller para funcionalidade de supervisor 2
     *sera relacionado com outros controllers
     * principalmente com de produtos, estoque e vendas
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('site.index');
    }

    public function sobre()
    {
        return view('site.sobre');
    }

    public function contato()
    {
        return view('site.contato');
    }

}
