<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estoque
 * 
 * @property int $id
 * @property int $produto_id
 * @property string $tipo_movimentacao
 * @property int $quantidade
 * @property Carbon $data_movimentacao
 * @property string|null $observacao
 * 
 * @property Produto $produto
 *
 * @package App\Models
 */
class Estoque extends Model
{
	protected $table = 'estoque';
	public $timestamps = false;

	protected $casts = [
		'produto_id' => 'int',
		'quantidade' => 'int',
		'data_movimentacao' => 'datetime'
	];

	protected $fillable = [
		'produto_id',
		'tipo_movimentacao',
		'quantidade',
		'data_movimentacao',
		'observacao'
	];

	public function produto()
	{
		return $this->belongsTo(Produto::class);
	}
}
