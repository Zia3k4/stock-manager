<?php
namespace App\Services;
use App\Models\Estoque;


class EstoqueService {
    protected $estoqueRepository;

    public function __construct(EstoqueRepository $estoqueRepository) {
        $this->estoqueRepository = $estoqueRepository;
    }

    public function getAll() {
        return $this->estoqueRepository->getAll();
    }

    public function getById($id) {
        return $this->estoqueRepository->getById($id);
    }

    public function create(array $data) {
        return $this->estoqueRepository->create($data);
    }

    public function update($id, array $data) {
        return $this->estoqueRepository->update($id, $data);
    }

    public function delete($id) {
        return $this->estoqueRepository->delete($id);
    }
}
