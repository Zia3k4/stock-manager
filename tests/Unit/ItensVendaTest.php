<?php

namespace Tests\Unit;

use App\Models\ItensVenda;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItensVendaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itens_venda_belongs_to_produto()
    {
        $produto = Produto::factory()->create();
        $itensVenda = ItensVenda::factory()->create(['produto_id' => $produto->id]);

        $this->assertInstanceOf(Produto::class, $itensVenda->produto);
    }

    /** @test */
    public function itens_venda_belongs_to_venda()
    {
        $venda = Venda::factory()->create();
        $itensVenda = ItensVenda::factory()->create(['venda_id' => $venda->id]);

        $this->assertInstanceOf(Venda::class, $itensVenda->venda);
    }
}
