<?php
namespace App\Exports;

use App\Models\User;
use App\Models\Usuario;
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
            'Nome',
            'Email',
            'Criado em',
            'Atualizado em',
        ];
    }

    public function map($usuario): array
    {
        return [
            $usuario->id,
            $usuario->name,
            $usuario->email,
            $usuario->created_at->format('d/m/Y H:i:s'),
            $usuario->updated_at->format('d/m/Y H:i:s'),
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
