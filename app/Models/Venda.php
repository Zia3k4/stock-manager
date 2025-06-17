<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItensVenda;

class Venda extends Model
{
    public function getAll()
    {
        return Venda::all();
    }
	protected $table = 'vendas';

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
}
