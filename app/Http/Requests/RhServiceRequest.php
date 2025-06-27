<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;
class RhServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id'=> 'required|integer',
            'data' => 'required|date',
            'hora_chegada' => 'required|date_format:H:i',
            'hora_saida' => 'required|date_format:H:i|after:hora_chegada',
            'atraso' => 'required|nullable',
            'saida_antecipada' => 'required|nullable',
            'observacoes' => 'nullable|string|max:255',

        ];
    }
}
