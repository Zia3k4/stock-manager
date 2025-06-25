<?php

namespace Tests\Unit;

use App\Models\Estoque;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EstoqueTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function estoque_can_be_created_with_fillable_fields()
    {
        $data = [
            'nome' => 'Teste Estoque',
            'descricao' => 'Descrição',
            'lote' => 123,
            'preco_unitario' => 10.50,
        ];

        $estoque = Estoque::create($data);

        $this->assertDatabaseHas('estoque', $data);
    }
}
