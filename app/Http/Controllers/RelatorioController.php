<?php

namespace App\Http\Controllers;
// associar com exports
use Illuminate\Http\Request;
// este aqui controller para gerar relatorios , vai pegar dados do
// banco de dados e gerar um relatorio em pdf ou excel
class RelatorioController extends Controller
{
    //baixar o a lib do laravel excel e dom[pdf]

    public function index()
    {
        return view('relatorios.index');
    }

    public function gerarRelatorio()
    {
        // Lógica para gerar o relatório

        // Você pode usar bibliotecas como Laravel Excel ou PDF para gerar relatórios
        
        $caminhoDoRelatorio = 'caminho/para/o/relatorio.pdf';
        // Exemplo de caminho para o relatório gerado
        return response()->download($caminhoDoRelatorio);
    }
    public function downloadRelatorio()
    {
        // Lógica para baixar o relatório
        // Você pode usar bibliotecas como Laravel Excel ou PDF para gerar relatórios
     /*
      *  return response()->download
      *($caminhoDoRelatorio);
      */

      //fazer a logica de download
    }
}
