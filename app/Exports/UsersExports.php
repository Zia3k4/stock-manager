<?php

namespace App\Exports;

use App\Models\User;

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

class UsersExports implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithTitle, WithEvents, WithStyles, WithColumnFormatting, FromQuery
{
    use Exportable;

    private $columns = [
        'id',
        'name',
        'email',
        'password',
        'created_at',
        'role',
    ];

    public function query()
    {
        return User::query();
    }

    public function collection()
    {
        return User::all();
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

    public function map($users): array
    {
        return [
            $users->id,
            $users->name,
            $users->email,
            $users->password,
            $users->created_at->format('d/m/Y H:i:s'),
            $users->role ? $users->role->name : 'N/A',
        ];
    }

    public function title(): string
    {
        return User::class;
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:E1')->getFont()->setBold(true);
        $sheet->getStyle('A1:E1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1:E1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(Color::COLOR_YELLOW);

        return [
            // Apply styles to the entire sheet
            'A1:E1' => ['font' => ['bold' => true]],
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER,
            'D' => NumberFormat::FORMAT_DATE_DATETIME,
            'E' => NumberFormat::FORMAT_DATE_DATETIME,
        ];
    }

    public function registerEvents(): array
    {
        return [
            // Example: AfterSheet event
            AfterSheet::class => function(AfterSheet $event) {
                // You can add custom logic here if needed
            },
        ];
    }
    public function download($fileName = 'users.xlsx')
    {
        return $this->download($fileName);
    }
    public function export($fileName = 'users.xlsx')
    {
        return $this->download($fileName);
    }
    public function store($fileName = 'users.xlsx')
    {
        return $this->store($fileName);
    }
    public function save($fileName = 'users.xlsx')
    {
        return $this->save($fileName);
    }
}
