<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Etapa 1: Permissões e papéis (deve vir antes dos usuários)
        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
        ]);

        // Etapa 2: Dados de negócio
        $this->call([
            FornecedoresSeeder::class,     // 2.1 Fornecedores
            ProdutoSeeder::class,          // 2.2 Produtos
            VendasSeeder::class,           // 2.3 Vendas
            ItemVendasSeeder::class,       // 2.4 Itens de Venda
            EstoqueSeeder::class,          // 2.5 Estoque
        ]);

        // Etapa 3: Recursos Humanos
        $this->call([
            FuncionarioSeeder::class,      // 3.1 Funcionários
        ]);

        // Etapa 4: Usuários e permissões
        $this->call([
            UserSeeder::class,             // 4.1 Criação e roles
            RoleSeeder::class,             // 4.2 Papéis
            PermissionSeeder::class,       // 4.3 Permissões
        ]);

        // Etapa 5: Registro de frequência
        $this->call([
            RegistroFrequenciaSeeder::class, // 5.1 Frequência
        ]);
    }
}
