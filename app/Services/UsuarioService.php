<?php
//revisar
namespace App\Services;

use App\Models\User;
use App\Repositories\UsuarioRepository;
use Illuminate\Database\Eloquent\Collection;
class UsuarioService {
protected UsuarioRepository $usuarioRepository;
    public function __construct(UsuarioRepository $usuarioRepository) {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function getAll(): Collection {
        return $this->usuarioRepository->all();
    }

    public function getById($id): ?User {
        return $this->usuarioRepository->find($id);
    }

    public function create(array $data): User {
        return $this->usuarioRepository->create($data);
    }

    public function update($id, array $data): ?User {
        return $this->usuarioRepository->update($id, $data);
    }

    public function delete($id): bool {
        return $this->usuarioRepository->delete($id);
    }
}
