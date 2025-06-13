<?php

namespace App\Repositories;

use App\Models\Fornecedores;
use Illuminate\Database\Eloquent\Collection;

class FornecedorRepository
{
    public function all(): Collection
    {
        return Fornecedores::latest()->get();
    }
    public function find ($id): ?Fornecedores
    {
        return Fornecedores::findOrFail($id);
    }
    public function create(array $data)
    {
        return Fornecedores::create($data);
    }
    public function update($id, array $data): ?Fornecedores
    {
        $fornecedores = $this->find($id);
        if ($fornecedores) {
            $fornecedores->update($data);
            return $fornecedores;
        }
        return null;
    }
    public function delete($id): bool
    {
        $fornecedores = $this->find($id);
        return $fornecedores->delete();
    }
}
