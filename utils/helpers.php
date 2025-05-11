<?php
//revisar
namespace App\Utils;

class SessionHelper
{
    public static function flashSucesso(string $mensagem): void
    {
        session()->flash('sucesso', $mensagem);
    }

    public static function flashErro(string $mensagem): void
    {
        session()->flash('erro', $mensagem);
    }

    public static function usuarioLogado(): ?int
    {
        return auth()->check() ? auth()->id() : null;
    }
    //revisar
}
