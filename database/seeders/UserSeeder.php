<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Gerente',
                'email' => 'gerente@example.com',
                'password' => Hash::make('admin123'),
                'role' => 'Gerente',
            ],
            [
                'name' => 'Supervisor 1',
                'email' => 'supervisor1@example.com',
                'password' => Hash::make('sup123'),
                'role' => 'Supervisor1',
            ],
            [
                'name' => 'Supervisor 2',
                'email' => 'supervisor2@example.com',
                'password' => Hash::make('sup456'),
                'role' => 'Supervisor2',
            ],
        ];

        foreach ($users as $data) {
            $user = User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'email_verified_at' => now(),
                    'password' => $data['password'],
                    'updated_at' => now(),
                    'remember_token' => null,
                ]
            );
            $user->syncRoles([$data['role']]);
        }

    }
}
