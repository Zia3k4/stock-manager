<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{ // sites de sobre, contato e termos de uso
      public function sobre()
    {
        return view('site.sobre');
    }

    public function contato()
    {
        return view('site.contato');
    }
}
