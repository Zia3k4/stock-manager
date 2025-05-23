<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // Gerente
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

            // Supervisor1
            'register new fornecedor',
            'view fornecedor',
            'delete fornecedor',
            'alter fornecedor',
            'manage fornecedor',

            // Supervisor2
            'register new produto',
            'view produto',
            'delete produto',
            'alter produto',
            'view estoque',
            'new estoque',
            'delete estoque',
            'edit estoque',
            'manage estoque',

            // Vendas
            'view vendas',
            'new vendas',
            'delete vendas',
            'edit vendas',
            'manage vendas',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
        }
    }
}
