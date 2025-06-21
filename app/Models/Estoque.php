<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estoque
 * 
 * @property int $id
 * @property string $nome
 * @property string|null $descricao
 * @property int $lote
 * @property float $preco_unitario
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Estoque extends Model
{
    use CrudTrait;
	protected $table = 'estoque';

	protected $casts = [
		'lote' => 'int',
		'preco_unitario' => 'float'
	];

	protected $fillable = [
		'nome',
		'descricao',
		'lote',
		'preco_unitario'
	];
}
