<?php

namespace Tests\Unit;

use App\Models\Fornecedores;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FornecedoresTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function fornecedor_can_be_created_with_fillable_fields()
    {
        $data = [
            'nome' => 'Fornecedor Teste',
            'cnpj' => '12345678901234',
            'cep' => '12345-000',
            'contato' => '999999999',
            'endereco' => 'Rua Teste'
        ];
        $fornecedor = Fornecedores::create($data);

        $this->assertDatabaseHas('fornecedores', $data);
    }
}
