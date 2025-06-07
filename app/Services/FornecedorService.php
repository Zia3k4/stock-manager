<?php

namespace\App\Services;
use App\Models\Fornecedor;


class FornecedorService {

    public function getAllFornecedores() {
        return Fornecedor::all();
    }

    public function getFornecedorById($id) {
        return Fornecedor::find($id);
    }

    public function createFornecedor(array $data) {
        return Fornecedor::create($data);
    }

    public function updateFornecedor($id, array $data) {
        $fornecedor = Fornecedor::find($id);
        if ($fornecedor) {
            $fornecedor->update($data);
            return $fornecedor;
        }
        return null;
    }

    public function deleteFornecedor($id) {
        $fornecedor = Fornecedor::find($id);
        if ($fornecedor) {
            $fornecedor->delete();
            return true;
        }
        return false;
    }
}
