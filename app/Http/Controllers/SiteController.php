<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    // sites de contratos ,termos, fale conosco, etc
    /**
     * Exibe a página inicial do site.
     *
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
