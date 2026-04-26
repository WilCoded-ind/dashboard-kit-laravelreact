<?php

namespace App\Services\Contracts;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserServiceInterface
{
    // ambil semua data user
    public function getAll(array $params): LengthAwarePaginator;

    // ambil data user berdasarkan id
    public function findById(int $id): User;

    // buat data user baru
    public function create(array $data): User;

    // update data user yang sudah ada
    public function update(User $user, array $data): User;

    // hapus data user
    public function delete(User $user): void;
}   
