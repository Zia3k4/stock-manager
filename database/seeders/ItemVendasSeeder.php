<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ItemVendasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();



        foreach (range(1, 10) as $i) {
            $vendaIds = DB::table('vendas')->pluck('id')->toArray();

            $produtoIds = DB::table('produtos')->pluck('id')->toArray();
            if (empty($vendaIds) || empty($produtoIds)) {
                continue; // Se não houver vendas ou produtos, não insira nada
            }
            // Verifica se há vendas e produtos disponíveis
            DB::table('itens_venda')->insert([
               'produto_id' => $faker->numberBetween(1, 10),
                'quantidade' => $faker->numberBetween(1, 10),
                'preco_unitario' => $faker->randomFloat(2, 5, 500),
                'status' => $faker->randomElement(['vendido', 'cancelado']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
