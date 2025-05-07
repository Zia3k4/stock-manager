<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Produto
 * 
 * @property int $id
 * @property string $descricao
 * @property float $preco
 * @property int $qtd_disponivel
 * @property string|null $nota_fiscal
 * @property int|null $fornecedor_id
 *
 * @package App\Models
 */
class Produto extends Model
{
	protected $table = 'produtos';
	public $timestamps = false;

	protected $casts = [
		'preco' => 'float',
		'qtd_disponivel' => 'int',
		'fornecedor_id' => 'int'
	];

	protected $fillable = [
		'descricao',
		'preco',
		'qtd_disponivel',
		'nota_fiscal',
		'fornecedor_id'
	];
}
