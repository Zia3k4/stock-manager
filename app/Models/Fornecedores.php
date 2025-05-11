<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fornecedores
 *
 * @property int $id
 * @property string $nome
 * @property string $cnpj
 * @property string|null $cep
 * @property string|null $contato
 * @property string|null $endereco
 *
 * @package App\Models
 */
class Fornecedores extends Model
{
	protected $table = 'fornecedores';
	public $timestamps = false;

	protected $fillable = [
		'nome',
		'cnpj',
		'cep',
		'contato',
		'endereco'
	];
}
