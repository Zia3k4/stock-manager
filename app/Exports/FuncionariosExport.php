<?php

namespace App\Exports;

use App\Models\Funcionario;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class FuncionariosExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    use Exportable;
    public function collection()
    {
        return Funcionario::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Nome',
            'cpf',
            'Cargo',
            'endereco',
            'cep',
            'salario',
            'telefone',
            'email',
        ];
    }
    public  function map($funcionario): array
    {
        return [
            $funcionario->id,
            $funcionario->nome,
            $funcionario->cpf,
            $funcionario->cargo,
            $funcionario->endereco,
            $funcionario->cep,
            $funcionario->salario,
            $funcionario->telefone,
            $funcionario->email,
        ];
    }
    public function fields(): array
    {
        return [
            'id',
            'nome',
            'cpf',
            'cargo',
            'endereco',
            'cep',
            'salario',
            'telefone',
            'email',
        ];
    }
    public function filename(): string
    {
        return 'funcionarios_export_' . now()->format('Y_m_d_H_i_s') . '.xlsx';
    }
}
