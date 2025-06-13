<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HorasTrabalhadasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }


    public function rules(): array
    {
        return [
            'id' => 'sometimes|integer|exists:horas_trabalhadas,id',
            'funcionario_id' => 'required|exists:funcionarios,id',
            'semana_inicio' => 'required|date',
            'semana_fim' => 'required|date|after_or_equal:semana_inicio',
            'total_horas' => 'required|numeric|min:0',


        ];
    }
}
