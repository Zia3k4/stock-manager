<?php

namespace App\Repositories;
use App\Models\registro_frequencia;
use Illuminate\Database\Eloquent\Collection;

class  RhServiceRepository
{
    public function all():Collection
    {
        return registro_frequencia::latest()->get();
    }
    public function find($id): ?registro_frequencia
    {
        return registro_frequencia::findOrFail($id);
    }
    public function create(array $data){
        return registro_frequencia::create($data);
    }
    public function update($id, array $data): ?registro_frequencia
    {
        $registro = $this->find($id);
        if ($registro) {
            $registro->update($data);
            return $registro;
        }
        return null;
    }
    public function delete($id): bool
    {
        $registro = $this->find($id);
        return $registro->delete();
    }

}
