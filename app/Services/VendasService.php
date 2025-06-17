<?php
namespace App\Services;
use App\Repositories\VendasRepository;
use App\Models\Venda;
use Illuminate\Database\Eloquent\Collection;
class VendasService
{
    protected VendasRepository $vendasRepository;
    public function all(): Collection
    {
        return $this->vendasRepository->getAll();

    }

    public function getById($id): ?Venda
    {
        return $this->vendasRepository->find($id);
    }

    public function create(array $data): ?Venda
    {
        return $this->vendasRepository->create($data);
    }

    public function update($id, array $data): ?Venda
    {
        return $this->vendasRepository->update($id, $data);
    }

    public function delete($id): bool
    {
        return $this->vendasRepository->delete($id);
    }
}
