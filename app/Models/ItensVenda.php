<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ItensVenda
 * 
 * @property int $id
 * @property int $venda_id
 * @property int $produto_id
 * @property int $quantidade
 * @property float $preco_unitario
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Produto $produto
 * @property Venda $venda
 *
 * @package App\Models
 */
class ItensVenda extends Model
{
	protected $table = 'itens_venda';

	protected $casts = [
		'venda_id' => 'int',
		'produto_id' => 'int',
		'quantidade' => 'int',
		'preco_unitario' => 'float'
	];

	protected $fillable = [
		'venda_id',
		'produto_id',
		'quantidade',
		'preco_unitario',
		'status'
	];

	public function produto()
	{
		return $this->belongsTo(Produto::class);
	}

	public function venda()
	{
		return $this->belongsTo(Venda::class);
	}
}
