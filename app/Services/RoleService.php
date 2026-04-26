<?php

namespace App\Services;

use App\Models\Role;
use App\Repositories\Contracts\RoleRepositoryInterface;
use App\Services\Contracts\RoleServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class RoleService implements RoleServiceInterface
{
    // constructor - inject RoleRepositoryInterface
    public function __construct(
        protected RoleRepositoryInterface $roleRepository   
    ) {}

    // method - ambil semua data role
    public function getAll(array $params): LengthAwarePaginator
    {
        return $this->roleRepository->getAll($params);
    }

    // method - ambil data role berdasarkan id
    public function findById(int $id): Role
    {
        return $this->roleRepository->findById($id);
    }

    // method - buat data role baru
    public function create(array $data): Role
    {
        return $this->roleRepository->create($data);
    }

    // method - update data role yang sudah ada
    public function update(Role $role, array $data): Role
    {
        return $this->roleRepository->update($role, $data);
    }

    // method - hapus data role
    public function delete(Role $role): void
    {
        $this->roleRepository->delete($role);
    }
}
