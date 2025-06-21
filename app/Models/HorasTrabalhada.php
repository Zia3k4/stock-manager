<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HorasTrabalhada
 * 
 * @property int $id
 * @property int $funcionario_id
 * @property Carbon $semana_inicio
 * @property Carbon $semana_fim
 * @property float $total_horas
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Funcionario $funcionario
 *
 * @package App\Models
 */
class HorasTrabalhada extends Model
{
    use CrudTrait;
	protected $table = 'horas_trabalhadas';

	protected $casts = [
		'funcionario_id' => 'int',
		'semana_inicio' => 'datetime',
		'semana_fim' => 'datetime',
		'total_horas' => 'float'
	];

	protected $fillable = [
		'funcionario_id',
		'semana_inicio',
		'semana_fim',
		'total_horas'
	];

	public function funcionario()
	{
		return $this->belongsTo(Funcionario::class);
	}
}
