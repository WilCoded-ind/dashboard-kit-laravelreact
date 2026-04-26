<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService implements UserServiceInterface
{
    // constructor - inject UserRepositoryInterface
    public function __construct(
        protected UserRepositoryInterface $userRepository   
    ) {}

    // method - ambil semua data user
    public function getAll(array $params): LengthAwarePaginator
    {
        return $this->userRepository->getAll($params);
    }

    // method - ambil data user berdasarkan id
    public function findById(int $id): User
    {
        return $this->userRepository->findById($id);
    }

    // method - buat data user baru
    public function create(array $data): User
    {
        return $this->userRepository->create($data);
    }

    // method - update data user yang sudah ada
    public function update(User $user, array $data): User
    {
        return $this->userRepository->update($user, $data);
    }

    // method - hapus data user
    public function delete(User $user): void
    {
        $this->userRepository->delete($user);
    }
}
