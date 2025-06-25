<?php

namespace Tests\Unit;

use App\Models\Funcionario;
use App\Models\HorasTrabalhada;
use App\Models\RegistroFrequencia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FuncionarioTest extends TestCase
{
    use RefreshDatabase;

    /** @test */


    /** @test */
    public function funcionario_has_registro_frequencia_relationship()
    {
        $funcionario = Funcionario::factory()->create();
        $registro = RegistroFrequencia::factory()->create(['funcionario_id' => $funcionario->id]);

        $this->assertTrue($funcionario->registro_frequencia->contains($registro));
    }
}
