<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistroFrequenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $funcionarios = DB::table('funcionarios')->pluck('id');

        foreach ($funcionarios as $id) {
            for ($i = 0; $i < 5; $i++) { // 5 dias de registro
                $data = Carbon::now()->subDays($i);

                // Simular horário
                $chegada = Carbon::createFromTime(8, rand(0, 59)); // entre 08:00 e 08:59
                $saida = (clone $chegada)->addHours(8)->addMinutes(rand(-30, 30)); // +- 30 minutos

                // Horário padrão
                $hora_padrao_chegada = Carbon::createFromTime(8, 0);
                $hora_padrao_saida = Carbon::createFromTime(17, 0);

                // Cálculos
                $horas_trabalhadas = $saida->diffInMinutes($chegada) / 60;
                $atraso = max(0, $chegada->diffInMinutes($hora_padrao_chegada) / 60);
                $saida_antecipada = max(0, $hora_padrao_saida->diffInMinutes($saida, false) < 0 ? abs($hora_padrao_saida->diffInMinutes($saida)) / 60 : 0);

                DB::table('registro_frequencia')->insert([
                    'funcionario_id' => $id,
                    'data' => $data->toDateString(),
                    'hora_chegada' => $chegada->format('H:i:s'),
                    'hora_saida' => $saida->format('H:i:s'),
                    'horas_trabalhadas' => round($horas_trabalhadas, 2),
                    'chegou_atrasado' => 1,
                    'saida_antecipada' => round($saida_antecipada, 2),
                    'observacoes' => rand(0, 10) > 8 ? 'Chegou atrasado por motivo pessoal' : null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
//revisar
