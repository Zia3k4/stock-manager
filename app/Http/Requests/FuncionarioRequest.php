<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
class FuncionarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'salario' => 'required|numeric|min:0',
            'cpf' => 'required|string|max:14|unique:funcionarios,cpf',
            'rg' => 'required|string|max:12|unique:funcionarios,rg',
            'endereco' => 'nullable|string|max:255',
            'cep' => 'nullable|string|max:9',
            'telefone' => 'required|string|max:13',
            'email' => 'required|email|max:255|unique:funcionarios,email',
        ];
    }
}
