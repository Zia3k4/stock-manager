<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class VendasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    /**
     *
     *
     */
    public function rules(): array
    {
        return [
            'vendas' => 'required|array',
            'data_venda' => 'required|date',
            'nome_cliente' => 'required|string|max:255',
            'cpf_cliente' => 'required|string|max:14|unique:vendas,cpf_cliente,' . $this->route('venda'),
            'valor_total' => 'required|numeric|min:0',
        ];
    }
}
