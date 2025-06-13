<?php
namespace App\Repositories;
use App\Models\Funcionario;
use Illuminate\Database\Eloquent\Collection;
class FuncionarioRepository
{
    public function all(): Collection
    {
        return Funcionario::orderBy('id', 'desc')->get();
       //depois defino timestamp true no model Funcionario
    }
    public function find($id): ?Funcionario
    {
        return Funcionario::findOrFail($id);
    }
    public function create(array $data)
    {
        return Funcionario::create($data);
    }
    public function update($id, array $data): ?Funcionario
    {
        $funcionario = $this->find($id);
        if ($funcionario) {
            $funcionario->update($data);
            return $funcionario;
        }
        return null;
    }
    public function delete($id): bool
    {
      $funcionario = $this->find($id);
      return $funcionario->delete();
    }
}

