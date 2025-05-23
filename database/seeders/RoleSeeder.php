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
            'view dashboard',
            'view dashboard gerente',
            'view dashboard supervisor',
            'view dashboard supervisor1',
            'view dashboard supervisor2',
            'magage dashboard supervisor',
            'manage dashboard supervisor1',

            'manage Rhservices',
            'register new employee',
            'view employee',
            'alter employees',
            'view employee supervisor1',
            'view employee supervisor2',
            'manage employees',
        ]);

        $supervisor1->syncPermissions([
            'register new fornecedor',
            'view fornecedor',
            'delete fornecedor',
            'alter fornecedor',
            'manage fornecedor',
        ]);

        $supervisor2->syncPermissions([
            'register new produto',
            'view produto',
            'delete produto',
            'alter produto',
            'view estoque',
            'new estoque',
            'delete estoque',
            'edit estoque',
            'manage estoque',
            'view vendas',
            'new vendas',
            'delete vendas',
            'edit vendas',
            'manage vendas',
        ]);
    }
}
