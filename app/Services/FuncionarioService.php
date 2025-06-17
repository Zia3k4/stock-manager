<?php

namespace App\Services;
use App\Repositories\FuncionarioRepository;
use App\Models\Funcionario;
use Illuminate\Database\Eloquent\Collection;

class FuncionarioService{

    protected FuncionarioRepository $funcionarioRepository;
    public function __construct(FuncionarioRepository $funcionarioRepository)
    {
        $this->funcionarioRepository = $funcionarioRepository;
    }

    public function getAll(): Collection
    {
        return $this->funcionarioRepository->all();
    }


    public function getById($id): ?Funcionario
    {
        return $this->funcionarioRepository->find($id);
    }


    public function create(array $data)
    {
        return $this->funcionarioRepository->create($data);
    }

    public function update($id, array $data): ?Funcionario
    {
        return $this->funcionarioRepository->update($id, $data);
    }

    public function delete($id):bool
    {
        return $this->funcionarioRepository->delete($id);
    }
}
