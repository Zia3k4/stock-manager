<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Limpa cache corretamente
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        // Lista de permissões
        $permissions = [
            // gerente
            'view dashboard',
            'view dashboard gerente',
            'view dashboard supervisor',
            'view dashboard supervisor1',
            'view dashboard supervisor2',
            'manage Rhservices',
            'register new employee',
            'view employee',
            'alter employees',
            'view employee supervisor1',
            'view employee supervisor2',
            'manage employees',

            // supervisor1
            'register new fornecedor',
            'view fornecedor',
            'delete fornecedor',
            'alter fornecedor',
            'manage fornecedor',

            // supervisor2
            'register new produto',
            'view produto',
            'delete produto',
            'alter produto',
            'view estoque',
            'new estoque',
            'delete estoque',
            'alter estoque',
            'manage estoque',
        ];

        // Criar permissões primeiro
        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
        }

        // Criar roles depois
        $gerente = Role::firstOrCreate(['name' => 'Gerente', 'guard_name' => 'web']);
        $supervisor1 = Role::firstOrCreate(['name' => 'Supervisor1', 'guard_name' => 'web']);
        $supervisor2 = Role::firstOrCreate(['name' => 'Supervisor2', 'guard_name' => 'web']);

        // Atribuir permissões
        $gerente->syncPermissions([
            'view dashboard',
            'view dashboard gerente',
            'view dashboard supervisor',
            'view dashboard supervisor1',
            'view dashboard supervisor2',
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
            'alter estoque',
            'manage estoque',
        ]);

        // Criar usuários
        $users = [
            [
                'name' => 'Gerente',
                'email' => 'gerente@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin123'),
                'data_registro' => now(),
                'role' => $gerente->name,
                'remember_token' => null,
            ],
            [
                'name' => 'Supervisor 1',
                'email' => 'supervisor1@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('sup123'),
                'data_registro' => now(),
                'role' => $supervisor1->name,
                'remember_token' => null,
            ],
            [
                'name' => 'Supervisor 2',
                'email' => 'supervisor2@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('sup456'),
                'data_registro' => now(),
                'role' => $supervisor2->name,
                'remember_token' => null,
            ],
        ];

        foreach ($users as $data) {
            $user = User::updateOrCreate(['email' => $data['email']], $data);
            $user->syncRoles([$data['role']]);
        }
    }
}
