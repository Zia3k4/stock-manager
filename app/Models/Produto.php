<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|ItensVenda[] $itens_vendas
 *
 * @package App\Models
 */
class Produto extends Model
{
    use CrudTrait;
	protected $table = 'produtos';

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

	public function itens_vendas()
	{
		return $this->hasMany(ItensVenda::class);
	}
    public function fornecedores(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Fornecedores::class);
    }
    public function setPrecoAttribute($value)
    {
        $this->attributes['preco'] = str_replace(['.', ','], ['', '.'], $value);
    }
}
