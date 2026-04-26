<?php

namespace App\Services\Contracts;

use App\Models\Role;
use Illuminate\Pagination\LengthAwarePaginator;

interface RoleServiceInterface
{
    // ambil semua data role
    public function getAll(array $params): LengthAwarePaginator;

    // ambil data role berdasarkan id
    public function findById(int $id): Role;

    // buat data role baru
    public function create(array $data): Role;

    // update data role yang sudah ada
    public function update(Role $role, array $data): Role;

    // hapus data role
    public function delete(Role $role): void;
}   
