<?php

namespace Tests\Unit;

use App\Models\HorasTrabalhada;
use App\Models\Funcionarios;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HorasTrabalhadaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function horas_trabalhada_belongs_to_funcionarios()
    {
        $funcionario = Funcionarios::factory()->create();
        $horas = HorasTrabalhada::factory()->create(['funcionario_id' => $funcionario->id]);

        $this->assertInstanceOf(Funcionarios::class, $horas->funcionario);
    }
}
