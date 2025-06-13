<?php

namespace App\Services;
use App\Repositories\FornecedorRepository;
use App\Models\Fornecedores;
use Illuminate\Database\Eloquent\Collection;

class FornecedorService{
    protected FornecedorRepository $fornecedorRepository;
    public function __construct(FornecedorRepository $fornecedorRepository){
        $this->fornecedorRepository = $fornecedorRepository;
    }
    public function getAll(): Collection
    {
        return $this->fornecedorRepository->all();
    }
    public function getById($id): ?Fornecedores
    {
        return $this->fornecedorRepository->find($id);
    }
    public function create(array $data)
    {
    return $this->fornecedorRepository->create($data);
    }
    public function update($id, array $data)
    {
        return $this->fornecedorRepository->update($id, $data);
    }
    public function delete($id):bool
    {
        return $this->fornecedorRepository->delete($id);
    }
}

