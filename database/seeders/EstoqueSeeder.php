<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EstoqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('pt_BR');
        $materiais = [
            'Cimento', 'Areia', 'Brita', 'Tijolo', 'Bloco de Concreto',
            'Madeira', 'Cal', 'Aço', 'Telha', 'Tinta', 'Massa Corrida',
            'Rejunte', 'Tubos PVC', 'Ferro', 'Porta de Madeira',
        ];

        foreach ($materiais as $item) {
            DB::table('estoque')->insert([
                'nome' => $item,
                'descricao' => $faker->sentence(8),
                'lote' => $faker->numberBetween(1, 50),
                'preco_unitario' => $faker->randomFloat(2, 5, 500),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}
