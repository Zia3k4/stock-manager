<?php
namespace App\Services;
use App\Repositories\ProdutoRepository;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Collection;
class ProdutoService
{
    protected ProdutoRepository $produtoRepository;

    public function __construct(ProdutoRepository $produtoRepository)
    {
        $this->produtoRepository = $produtoRepository;
    }

    public function getAll(): Collection
    {
        return $this->produtoRepository->all();
    }

    public function getById($id): ?Produto
    {
        return $this->produtoRepository->find($id);
    }

    public function create(array $data): Produto
    {
        return $this->produtoRepository->create($data);
    }

    public function update($id, array $data): ?Produto
    {
        return $this->produtoRepository->update($id, $data);
    }

    public function delete($id): bool
    {
        return $this->produtoRepository->delete($id);
    }
}
