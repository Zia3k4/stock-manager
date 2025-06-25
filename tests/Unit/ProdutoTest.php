<?php

namespace Tests\Unit;

use App\Models\Produto;
use App\Models\ItensVenda;
use App\Models\Fornecedores;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProdutoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function produto_has_itens_vendas_relationship()
    {
        $produto = Produto::factory()->create();
        $item = ItensVenda::factory()->create(['produto_id' => $produto->id]);
        $this->assertTrue($produto->itens_vendas->contains($item));
    }

    /** @test */
    public function produto_belongs_to_fornecedores()
    {
        $fornecedor = Fornecedores::factory()->create();
        $produto = Produto::factory()->create(['fornecedor_id' => $fornecedor->id]);
        $this->assertInstanceOf(Fornecedores::class, $produto->fornecedores);
    }

    /** @test */
    public function set_preco_attribute_converts_format()
    {
        $produto = new Produto();
        $produto->preco = '1.234,56';
        $this->assertEquals(1234.56, $produto->preco);
    }
}
