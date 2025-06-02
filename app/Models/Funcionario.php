<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
 * @property Collection|registro_frequencia[] $registro_frequencia
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

	public function registro_frequencia(): HasMany
    {
		return $this->hasMany(registro_frequencia::class);
	}

}
