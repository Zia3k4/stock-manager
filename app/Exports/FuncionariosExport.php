<?php

namespace App\Exports;

use App\Models\Produto;
use Maatwebsite\Excel\Concerns\FromCollection;

class FuncionariosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return \App\Models\Funcionario::select('id', 'nome', 'cargo', 'salario', 'data_admissao')
            ->orderBy('nome')
            ->get();
    }

}
