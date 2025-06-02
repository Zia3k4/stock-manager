<?php

namespace App\Exports;

use App\Models\Produto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
class ProdutosExport implements FromCollection
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    private $columns = [
        'id',
        'nome',
        'descricao',
        'preco',
        'quantidade',
        'categoria_id',
    ];
    public function collection()
    {
        return Produto::all();
    }
    public function query()
    {
        return Produto::query();
    }
}
