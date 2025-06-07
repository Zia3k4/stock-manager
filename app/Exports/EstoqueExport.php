<?php

namespace App\Exports;

use App\Models\Estoque;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class EstoqueExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    use Exportable;

   public function collection(): \Illuminate\Support\Collection
   {
        return Estoque::all();
   }
    public function headings(): array
    {
        return [
            'ID',
            'descricao',
            'lote',
           'preco_unitario',


        ];
    }
    public function map($estoque): array
    {
        return [
            $estoque->id,
            $estoque->descricao,
            $estoque->lote,
            $estoque->preco_unitario,
        ];
    }
    public function fields(): array
    {
        return [
            'id',
            'descricao',
            'lote',
            'preco_unitario',
        ];
    }
    public function filename(): string
    {
        return 'estoque_export_' . now()->format('Ymd_His') . '.xlsx';
    }
}
