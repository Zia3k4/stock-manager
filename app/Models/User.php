<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
use Notifiable, HasRoles, HasFactory, HasApiTokens;

protected $table = 'users';

protected $casts = [
'email_verified_at' => 'datetime',
];

protected $hidden = [
'password',
'remember_token',
];

protected $fillable = [
'name',
'email',
'email_verified_at',
'password',
'remember_token',
];

public function sendPasswordResetNotification($token): void
{
$this->notify(new \Illuminate\Auth\Notifications\ResetPassword($token));
}
    public function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
