<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface
{
    // method - ambil semua data user
    public function getAll(array $params): LengthAwarePaginator
    {
        return User::with('roles')
            // search
            ->when($params['search'] ?? null, fn($q, $search) =>
            $q->where('name', 'like', "%$search%")
              ->orWhere('username', 'like', "%$search%")
            )

            // sorting
            ->orderBy($params['sort'] ?? 'id', $params['direction'] ?? 'asc')

            // paginate
            ->paginate($params['per_page'] ?? 10);
    }

    // method - ambil data user berdasarkan id
    public function findById(int $id): User
    {
        return User::with('roles')->findOrFail($id);
    }

    // method - buat data user baru
    public function create(array $data): User
    {
        return User::create($data);
    }

    // method - update data user yang sudah ada
    public function update(User $user, array $data): User
    {
        $user->update($data);
        return $user;
    }

    // method - hapus data user
    public function delete(User $user): void
    {
        $user->delete();
    }
}