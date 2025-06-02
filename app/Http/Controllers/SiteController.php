<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncionarioRequest;
use Inertia\Inertia;

class SiteController extends Controller
{
    // sites de contratos ,termos, fale conosco, etc
    public function termos()
    {
        return response()->json([
            'message' => 'Leia os termos de uso do site.',
        ]);
    }

    public function about()
    {
        return response()->json([
            'message' => 'Sobre nós: conheça nossa empresa e nossos valores.',
        ]);
    }

    public function contato()
    {
        return response()->json([
            'message' => 'Entre em contato conosco para mais informações.',
        ]);
    }
}
/**
 *  este aqui ver mais tarde , é termos, contratos e fale conosco
 */
