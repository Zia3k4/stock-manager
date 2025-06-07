<?php

namespace App\Exports;

use App\Models\Venda;

    use Maatwebsite\Excel\Concerns\FromCollection;
    use Maatwebsite\Excel\Concerns\WithHeadings;
    use Maatwebsite\Excel\Concerns\WithMapping;
    use Maatwebsite\Excel\Concerns\ShouldAutoSize;
    use Maatwebsite\Excel\Concerns\Exportable;

class VendasExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    use Exportable;

    public function collection(): \Illuminate\Support\Collection
    {
        return Venda::all();
        // Retorna todas as vendas para exportação

    }

    public function headings(): array
    {
        return [
            'id',
            'data_venda',
            'nome_cliente',
            'cpf_cliente',
            'valor_total',
        ];
    }

    public function map($venda): array
    {
        return [
            $venda->id,
            $venda->data_venda,
            $venda->nome_cliente,
            $venda->cpf_cliente,
            $venda->valor_total,
        ];
    }

    public function fields(): array
    {
        return [
            'id',
            'data_venda',
            'nome_cliente',
            'cpf_cliente',
            'valor_total',
        ];

    }
}
