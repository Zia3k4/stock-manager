<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $gerente = Role::firstOrCreate(['name' => 'Gerente', 'guard_name' => 'web']);
        $supervisor1 = Role::firstOrCreate(['name' => 'Supervisor1', 'guard_name' => 'web']);
        $supervisor2 = Role::firstOrCreate(['name' => 'Supervisor2', 'guard_name' => 'web']);

        $gerente->syncPermissions([
             'dashboard.gerente',
             'relatorios.ver',
             'relatorios.exportar',
             'funcionarios.index', 'funcionarios.create', 'funcionarios.edit',
             'funcionarios.delete', 'funcionarios.show',
             'usuarios.index',
             'usuarios.create',
             'usuarios.edit',
             'usuarios.delete',
             'usuarios.show',
             'rhservice.index',
             'rhservice.create',
             'rhservice.show',
             'rhservice.edit',


        ]);

        $supervisor1->syncPermissions([
             'dashboard.supervisor1',
             'fornecedores.index', 'fornecedores.create', 'fornecedores.edit', 'fornecedores.delete', 'fornecedores.show',
        ]);

        $supervisor2->syncPermissions([
            'dashboard.supervisor2',
            'estoque.index',
            'estoque.create',
            'estoque.edit',
            'estoque.delete',
            'estoque.show',
            'vendas.index',
            'vendas.create',
            'vendas.edit',
            'vendas.delete',
            'vendas.show',
            'produtos.index',
            'produtos.create',
            'produtos.edit',
            'produtos.delete',
            'produtos.show',
        ]);
    }
}
