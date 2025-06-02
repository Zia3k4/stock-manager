<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Passwords\CanResetPassword;

class User extends Authenticatable
{
use Notifiable, HasRoles,HasFactory, CanResetPassword;

protected $table = 'users';

private const FILLABLE_FIELDS = [
'name',
'email',
'email_verified_at',
'password',
'created_at',
'role',
'remember_token',
];

private const HIDDEN_FIELDS = [
'password',
'remember_token',
];

private const CASTS_FIELDS = [
'email_verified_at' => 'datetime',
'created_at' => 'datetime',
];

protected $fillable = self::FILLABLE_FIELDS;
protected $hidden = self::HIDDEN_FIELDS;
protected $casts = self::CASTS_FIELDS;
}
