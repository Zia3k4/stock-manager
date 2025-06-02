<?php

namespace App\Exports;

use App\Models\Estoque;
use Maatwebsite\Excel\Concerns\FromCollection;

class EstoqueExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Estoque::all();
    }
}
