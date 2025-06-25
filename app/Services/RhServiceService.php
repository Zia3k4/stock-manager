<?php
namespace App\Services;
use App\Models\Funcionarios;
use App\Repositories\RhServiceRepository;
use App\Models\registro_frequencia;
use Illuminate\Database\Eloquent\Collection;
class RhServiceService
{
    protected RhServiceRepository $rhServiceRepository;

    public function __construct(RhServiceRepository $rhServiceRepository)
    {
        $this->rhServiceRepository = $rhServiceRepository;
    }

    public function getAll(): Collection
    {
        return $this->rhServiceRepository->all();
    }

    public function getById($id): ?registro_frequencia
    {
        return $this->rhServiceRepository->find($id);
    }

    public function create(array $data): registro_frequencia
    {
        return $this->rhServiceRepository->create($data);
    }

    public function update($id, array $data): ?registro_frequencia
    {
        return $this->rhServiceRepository->update($id, $data);
    }

    public function delete($id): bool
    {
        return $this->rhServiceRepository->delete($id);
    }
    public function funcionario(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Funcionarios::class);
    }
}
