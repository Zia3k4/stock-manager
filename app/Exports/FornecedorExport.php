<?php

namespace App\Exports;
use App\Models\Fornecedores;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FornecedorExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    use Exportable;
    public function collection(): \Illuminate\Support\Collection
    {
        return Fornecedores::all();
        // Retorna todos os fornecedores para exportacao , depois ver as permissions se afeta aqui

    }
   public function headings(): array
     { return
         [
           'id',
           'cpnj',
           'cep,',
           'contato',
           'endereco',
        ];
     }

       public function map($fornecedor): array
         {
              return [
                $fornecedor->id,
                $fornecedor->cnpj,
                $fornecedor->cep,
                $fornecedor->contato,
                $fornecedor->endereco,
              ];
         }
         public function fields(): array
         {
             return [
                 'id',
                 'cnpj',
                 'cep',
                 'contato',
                 'endereco',
             ];
         }
         public function fileName(): string
         {
             return 'forncedore_export_' . now()->format('Y_m_d_H_i_s') . '.xlsx';
         }



}
