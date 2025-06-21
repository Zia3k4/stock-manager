<?php

namespace App\Http\Controllers\ControllersPublic;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class AuthController extends Controller
{ // sites de sobre, contato e termos de uso
      public function index()
    {
        return Inertia::render('login/contrato');
    }

}
