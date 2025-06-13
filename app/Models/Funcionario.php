<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Funcionario
 * 
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property string $rg
 * @property string $cargo
 * @property string|null $endereco
 * @property string|null $cep
 * @property float|null $salario
 * @property string $telefone
 * @property string $email
 * 
 * @property Collection|HorasTrabalhada[] $horas_trabalhadas
 * @property Collection|RegistroFrequencium[] $registro_frequencia
 *
 * @package App\Models
 */
class Funcionario extends Model
{
	protected $table = 'funcionarios';
	public $timestamps = false;

	protected $casts = [
		'salario' => 'float'
	];

	protected $fillable = [
		'nome',
		'cpf',
		'rg',
		'cargo',
		'endereco',
		'cep',
		'salario',
		'telefone',
		'email'
	];

	public function horas_trabalhadas()
	{
		return $this->hasMany(HorasTrabalhada::class);
	}

	public function registro_frequencia()
	{
		return $this->hasMany(RegistroFrequencium::class);
	}
}
