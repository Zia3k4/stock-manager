<?php

namespace App\Services;
use App\Repositories\HorasTrabalhadasRepository;
use App\Models\HorasTrabalhada;
use Illuminate\Database\Eloquent\Collection;

class HorasTrabalhadasService
{
    protected HorasTrabalhadasRepository $horasTrabalhadasRepository;

    public function __construct(HorasTrabalhadasRepository $horasTrabalhadasRepository)
    {
        $this->horasTrabalhadasRepository = $horasTrabalhadasRepository;
    }

    public function getAll(): Collection
    {
        return $this->horasTrabalhadasRepository->all();
    }

    public function getById($id): ?HorasTrabalhada
    {
        return $this->horasTrabalhadasRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->horasTrabalhadasRepository->create($data);
    }

    public function update($id, array $data): ?HorasTrabalhada
    {
        return $this->horasTrabalhadasRepository->update($id, $data);
    }
    public function delete($id): bool
    {
        return $this->horasTrabalhadasRepository->delete($id);
    }

}
