<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Permissões e papéis
        app(PermissionRegistrar::class)->forgetCachedPermissions();
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
        ]);

        // 2. Usuários
        $this->call([
            UserSeeder::class,
        ]);

        // 3. Dados de negócio
        $this->call([
            FornecedoresSeeder::class,
            ProdutoSeeder::class,
            VendasSeeder::class,
            ItemVendasSeeder::class,
            EstoqueSeeder::class,
            FuncionarioSeeder::class,
            RegistroFrequenciaSeeder::class,
        ]);
    }
}

