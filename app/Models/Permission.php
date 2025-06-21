<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use CrudTrait;
    protected $table = 'permissions';

    protected $fillable = [
        'name',
        'guard_name'
    ];

    public function model_has_permissions(): HasMany
    {
        return $this->hasMany(ModelHasPermission::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_has_permissions');
    }
}
