<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CacheLock
 * 
 * @property string $key
 * @property string $owner
 * @property int $expiration
 *
 * @package App\Models
 */
class CacheLock extends Model
{
    use CrudTrait;
	protected $table = 'cache_locks';
	protected $primaryKey = 'key';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'expiration' => 'int'
	];

	protected $fillable = [
		'owner',
		'expiration'
	];
}
