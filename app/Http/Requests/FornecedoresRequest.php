<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FornecedoresRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'cnpj' => 'required|string|max:18|unique:fornecedores,cnpj,' . $this->route('fornecedor'),
            'cep' => 'nullable|string|max:9',
            'contato' => 'required|string|max:15',
            'endereco' => 'nullable|string|max:255',
        ];
    }
}
