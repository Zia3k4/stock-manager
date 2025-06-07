<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;

class AuthController extends Controller
{ // sites de sobre, contato e termos de uso
      public function index()
    {
        return Inertia::render('login/contrato');
    }


}
