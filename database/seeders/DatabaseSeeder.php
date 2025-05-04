<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\FuncionarioSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this -> call(class:FornecedoresSeeder::class);
        
        $this-> call(class: ProdutoSeeder::class);

        $this-> call(class:FuncionarioSeeder::class);
        $this-> call(class:UsersSeeder::class);
    }
    
}
