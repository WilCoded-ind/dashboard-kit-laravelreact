<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Services\Contracts\PermissionServiceInterface;
use App\Repositories\Contracts\PermissionRepositoryInterface;

class PermissionService implements PermissionServiceInterface
{
    public function __construct(
        protected PermissionRepositoryInterface $permissionRepository
    ) {}

    // method - ambil data permission berdasarkan role id
    public function getByRoleId(int $roleId): Collection
    {
        return $this->permissionRepository->getByRoleId($roleId);
    }

    // method - update permission berdasarkan role id
    public function updateByRoleId(int $roleId, array $data): void
    {
        $this->permissionRepository->updateByRoleId($roleId, $data);
    }
}
