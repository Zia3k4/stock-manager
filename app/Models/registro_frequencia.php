<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RegistroFrequencium
 *
 * @property int $id
 * @property int $funcionario_id
 * @property Carbon $data
 * @property Carbon|null $hora_chegada
 * @property Carbon|null $hora_saida
 * @property float|null $horas_trabalhadas
 * @property float|null $atraso
 * @property float|null $saida_antecipada
 * @property string|null $observacoes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Funcionario $funcionario
 *
 * @package App\Models
 */
class registro_frequencia extends Model
{
	protected $table = 'registro_frequencia';

	protected $casts = [
		'funcionario_id' => 'int',
		'data' => 'datetime',
		'hora_chegada' => 'datetime',
		'hora_saida' => 'datetime',
		'horas_trabalhadas' => 'float',

		'saida_antecipada' => 'float'
	];

	protected $fillable = [
		'funcionario_id',
		'data',
		'hora_chegada',
		'hora_saida',
		'horas_trabalhadas',
        'chegou_atrasado',
		'saida_antecipada',
		'observacoes'
	];

	public function funcionario()
	{
		return $this->belongsTo(Funcionario::class);
	}
}
