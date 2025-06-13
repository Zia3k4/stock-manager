<?php

namespace  App\Repositories;
use App\Models\Estoque;

class EstoqueRepository
{
    public function all()
    {
        return Estoque::latest()->get();
    }

    public function find($id)
    {
        return Estoque::find($id);
    }

    public function create(array $data)
    {
        return Estoque::create($data);
    }

    public function update($id, array $data)
    {
        $estoque = Estoque::find($id);
        if ($estoque) {
            $estoque->update($data);
            return $estoque;
        }
        return null;
    }

    public function delete($id)
    {
        $estoque = Estoque::find($id);
        if ($estoque) {
            $estoque->delete();
            return true;
        }
        return false;
    }
}
