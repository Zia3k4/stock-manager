<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
             //permissões gerais
             'login',
             'logout',
             'cadastro',
             'esqueceu_senha',
             'recuperar_senha',
             'ver_termos',
             'aceitar_termos',
             'ver_contrato',
             'failed_login',
             'fale_conosco',

             // Gerente
             'dashboard.gerente',
             'relatorios.ver',
             'relatorios.exportar',
             'funcionarios.index',
             'funcionarios.create',
             'funcionarios.edit',
             'funcionarios.delete',
             'funcionarios.show',
             'usuarios.index',
             'usuarios.create',
             'usuarios.edit',
             'usuarios.delete',
             'usuarios.show',
             'rhservice.index',
             'rhservice.create',
             'rhservice.show',
             'rhservice.edit',

             // Supervisor1
             'dashboard.supervisor1',
             'fornecedores.index',
             'fornecedores.create',
             'fornecedores.edit',
             'fornecedores.delete',
             'fornecedores.show',

             // Supervisor2
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
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
        }
    }
}
