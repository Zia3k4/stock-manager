<?php

namespace App\Services;
use App\Models\Funcionario;

class FuncionarioService {

    protected $funcionarioRepository;

    public function __construct(Funcionario $funcionarioRepository) {
        $this->funcionarioRepository = $funcionarioRepository;
    }

    public function getAllFuncionarios() {
        return $this->funcionarioRepository->all();
    }

    public function getFuncionarioById($id) {
        return $this->funcionarioRepository->find($id);
    }

    public function createFuncionario(array $data) {
        return $this->funcionarioRepository->create($data);
    }

    public function updateFuncionario($id, array $data) {
        $funcionario = $this->getFuncionarioById($id);
        if ($funcionario) {
            return $funcionario->update($data);
        }
        return null;
    }

    public function deleteFuncionario($id) {
        $funcionario = $this->getFuncionarioById($id);
        if ($funcionario) {
            return $funcionario->delete();
        }
        return null;
    }
}
