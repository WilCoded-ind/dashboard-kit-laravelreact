<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface PermissionRepositoryInterface
{
    // ambil semua data permission berdasarkan role id
    public function getByRoleId(int $roleId): Collection;

    // update permission berdasarkan role id
    public function updateByRoleId(int $roleId, array $permissions): void;
}