<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class VendasSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           $faker = Faker::create();

        foreach (range(1, 10) as $i) {
            DB::table('vendas')->insert([
                'data_venda' => $faker->dateTimeBetween('-1 year', 'now'),
                'nome_cliente' => $faker->name,
                'cpf_cliente' => $faker->numerify('###.###.###-##'),
                'valor_total' => $faker->randomFloat(2, 50, 1000),
                'created_at' => now(),
            ]);
        }
    }
}
