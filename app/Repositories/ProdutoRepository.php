<?php
namespace App\Repositories;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Collection;

class ProdutoRepository
{
    public function all(): Collection
    {
        return Produto::latest()->get();
    }

    public function find($id): ?Produto
    {
        return Produto::findOrFail($id);
    }
    public function create(array $data)
    {
        return Produto::create($data);
    }
    public function update($id, array $data): ?Produto
    {
        $produto = $this->find($id);
        if ($produto) {
            $produto->update($data);
            return $produto;
        }
        return null;
    }
    public function delete($id): bool
    {
        $produto = $this->find($id);
        return $produto->delete();
    }
}
