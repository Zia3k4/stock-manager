<?php

namespace App\Exports;

use App\Models\registro_frequencia;
use App\Models\Horastrabalhadas;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
class RhServiceExport implements FromCollection,FromQuery
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    

    public function collection()
    {
        return registro_frequencia::all();
    }
    public function query()
    {
        return registro_frequencia::query();
    }
}
