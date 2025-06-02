<?php
namespace App\Exports;

use App\Models\Venda;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Font;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class VendasExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithTitle, WithEvents, WithStyles, WithColumnFormatting
{
    use Exportable;

    public function query()
    {
        return Venda::query();
    }

    public function headings(): array
    {
        return [
            'ID',
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
            $venda->data_venda ? $venda->data_venda->format('d/m/Y H:i:s') : '',
            $venda->nome_cliente,
            $venda->cpf_cliente,
            $venda->valor_total,
        ];
    }

    public function title(): string
    {
        return 'Vendas';
    }

    public function registerEvents(): array
    {
        return [];
    }

    public function styles(Worksheet $sheet)
    {
        return [];
    }

    public function columnFormats(): array
    {
        return [];
    }
}
