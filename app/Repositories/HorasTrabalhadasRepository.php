<?php

namespace App\Repositories;

use App\Models\HorasTrabalhada;
use Illuminate\Database\Eloquent\Collection;
class HorasTrabalhadasRepository
{
 public function all(): Collection
 {
     return HorasTrabalhada::latest()->get();
 }
 public function find($id): ?HorasTrabalhada
 {
     return HorasTrabalhada::findOrFail($id);
 }
    public function create(array $data)
    {
        return HorasTrabalhada::create($data);
    }
    public function update($id, array $data): ?HorasTrabalhada
    {
        $horasTrabalhada = $this->find($id);
        if ($horasTrabalhada) {
            $horasTrabalhada->update($data);
            return $horasTrabalhada;
        }
        return null;
    }
    public function delete($id): bool
    {
        $horasTrabalhadas = $this->find($id);
        return $horasTrabalhadas->delete();
    }
}
