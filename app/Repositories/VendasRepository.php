<?php

namespace App\Repositories;
use App\Models\Venda;

class VendasRepository{
    public function all(){
        return Venda::latest()->get();
    }
    public function find($id): ?Venda
    {
        return Venda::find($id);
    }
    public function create(array $data)
    {
        return Venda::create($data);
    }
    public function update($id, array $data): ?Venda
    {
        $venda = $this->find($id);
        if ($venda) {
            $venda->update($data);
            return $venda;
        }
        return null;
    }
    public function delete($id): bool
    {
        $venda = $this->find($id);
        if ($venda) {
            return $venda->delete();
        }
        return false;
    }
}
