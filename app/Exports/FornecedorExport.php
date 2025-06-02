<?php

namespace App\Exports;

use App\Models\Fornecedores;
use Maatwebsite\Excel\Concerns\FromCollection;
use Doctrine\DBAL\Query;

class FornecedorExport
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Fornecedores::all();
    }
}
