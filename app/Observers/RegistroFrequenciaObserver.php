<?php

namespace App\Observers;

use App\Models\RegistroFrequencia;


/**
 * RegistroFrequenciaObserver
 *
 * Observa eventos do modelo RegistroFrequencia e calcula as horas trabalhadas.
 */
class RegistroFrequenciaObserver
{
    public function saving(RegistroFrequencia $registro)
    {
        if ($registro->hora_chegada && $registro->hora_saida) {
            $horaChegada = strtotime($registro->hora_chegada);
            $horaSaida = strtotime($registro->hora_saida);
            $diferencaHoras = ($horaSaida - $horaChegada) / 3600;

            $registro->horas_trabalhadas = round($diferencaHoras, 2);
        }
    }
}
