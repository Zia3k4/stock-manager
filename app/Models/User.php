<?php

namespace App\Models;

use PhpParser\Builder\Class_;
use Spatie\Permission\Traits\HasRoles;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    use HasRoles;
}
class Gate extends User
{
    public function setupRolesAndPermissions()
    {
        // Criar papéis
        $admin = Role::create(['name' => 'admin']);
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
