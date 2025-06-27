<?php
namespace App\Http\Requests;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
class ProdutosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }
    /**
     * Get the validation rules that apply to the request
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
        'descricao' => 'required|string|max:255',
        'preco' => 'required|numeric|min:0|max:999999.99',
        'qtd_disponivel' => 'required|integer|min:0',
        'nota_fiscal' => 'required|string|max:255',
        'fornecedor_id' => 'required|exists:fornecedores,id',
        ];
    }
}
