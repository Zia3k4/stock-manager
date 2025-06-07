<?php

namespace App\Exports;
use App\Models\Produto;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;

class ProdutosExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    use exportable;
    public function collection(): \Illuminate\Support\Collection
    {
        return Produto::all();
    }
    public function headings(): array
    {
        return [
            'ID',
             'descricao',
            'preco',
            'qtd_disponivel',
            'nota_fiscal',
        ];
    }
    public function map($produto): array
    {
        return [
            $produto->id,
            $produto->descricao,
            $produto->preco,
            $produto->qtd_disponivel,
            $produto->nota_fiscal,
        ];
    }
    public function fields(): array
    {
        return [
            'id',
            'descricao',
            'preco',
            'qtd_disponivel',
            'nota_fiscal',
        ];
    }
    public function filename(): string
    {
        return 'produtos_export_' . now()->format('Y_m_d_H_i_s') . '.xlsx';
    }
}
