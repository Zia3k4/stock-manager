<?php
 namespace App\Repositories;
 use App\Models\User;
 use Illuminate\Support\Collection;

 class UsuarioRepository{
        public function all():Collection
        {
            return User::latest()->get();
        }

        public function find($id): ?User
        {
            return User::find($id);
        }

        public function create(array $data)
        {
            return User::create($data);
        }

        public function update($id, array $data): ?User
        {
            $users = $this->find($id);
            if ($users) {
                $users->update($data);
                return $users;
            }
            return null;
        }

        public function delete($id): bool
        {
            $users = $this->find($id);
            return $users->delete();
        }

 }
