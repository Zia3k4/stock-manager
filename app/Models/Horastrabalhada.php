<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Horastrabalhada
 * 
 * @property int $id
 * @property int $funcionario
 * @property Carbon $date
 * @property Carbon $start_time
 * @property Carbon|null $end_time
 * @property float|null $hours_worked
 * @property string|null $situacao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Horastrabalhada extends Model
{
	protected $table = 'horastrabalhadas';

	protected $casts = [
		'funcionario' => 'int',
		'date' => 'datetime',
		'start_time' => 'datetime',
		'end_time' => 'datetime',
		'hours_worked' => 'float'
	];

	protected $fillable = [
		'funcionario',
		'date',
		'start_time',
		'end_time',
		'hours_worked',
		'situacao'
	];
}
