<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EstoqueRequest extends FormRequest
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
            'produto' => 'required|string|max:255',
            'quantidade' => 'required|integer|min:0',
            'preco_unitario' => 'required|numeric|min:0',
            'descricao' => 'nullable|string|max:500',
            'categoria' => 'nullable|string|max:255',
            'codigo_barras' => 'nullable|string|max:20|unique:estoques,codigo_barras,' . $this->route('estoque'),
        ];
    }
}
