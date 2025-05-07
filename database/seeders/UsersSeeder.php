<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run(): void
    {
        $users = [
            [
                //dar olhadas nas namespace e compatibilidades das tabelas depois, isso é do projeto anterior
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('senha_hashada_admin'),
                'role' => 'admin',
            ],
            [
                'name' => 'Usuario1',
                'email' => 'usuario1@example.com',
                'password' => Hash::make('senha_hashada_user1'),
                'role' => 'user',
            ],
            [
                'name' => 'Usuario2',
                'email' => 'usuario2@example.com',
                'password' => Hash::make('senha_hashada_user2'),
                'role' => 'user',
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->updateOrInsert(
                ['email' => $user['email']],
                $user
            );
        }
    }

}
class Gate extends Seeder
{
    public function setupRolesAndPermissions()
    {
        // Criar papéis
        $admin = Role::create(['name' => 'Admin']);
        $supervisor1 = Role::create(['name' => 'supervisor1']);
        $supervisor2 = Role::create(['name' => 'supervisor2']);

        // Criar permissões
        Permission::create(['name' => 'view dashboard supervisor1']);
        Permission::create(['name' => 'view dashboard supervisor2']);
        Permission::create(['name' => 'manage stock']);
        Permission::create(['name' => 'manage employees']);

        // Atribuir permissões aos papéis
        $admin->givePermissionTo(Permission::all());
        $supervisor1->givePermissionTo(['view dashboard supervisor1', 'manage stock']);
        $supervisor2->givePermissionTo(['view dashboard supervisor2', 'manage employees']);
    }
}
// fazer o gate dos usuarios por aqu
