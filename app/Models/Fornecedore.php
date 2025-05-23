<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fornecedore
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
class Fornecedore extends Model
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
