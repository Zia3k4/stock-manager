<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

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
 * @package App\Models
 */
class Funcionario extends Model
{
	protected $table = 'funcionarios';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
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
}
