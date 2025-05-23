<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Venda
 *
 * @property int $id
 * @property Carbon $data_venda
 * @property string|null $nome_cliente
 * @property string|null $cpf_cliente
 * @property float $valor_total
 *
 * @property Collection|ItensVenda[] $itens_vendas
 *
 * @package App\Models
 */
class Venda extends Model
{
	protected $table = 'vendas';
	public $timestamps = false;

	protected $casts = [
		'data_venda' => 'datetime',
		'valor_total' => 'float'
	];

	protected $fillable = [
		'data_venda',
		'nome_cliente',
		'cpf_cliente',
		'valor_total'
	];

	public function itens_vendas()
	{
		return $this->hasMany(ItensVenda::class);
	}
    public function getValorTotalAttribute($value)
    { //revisar isto
        return number_format($value, 2, ',', '.');
    }
    public function item()
    {
        return $this->hasMany(ItensVenda::class);
    }
}
