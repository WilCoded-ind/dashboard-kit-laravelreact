<?php

namespace App\Services;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Contracts\MenuRepositoryInterface;
use App\Services\Contracts\MenuServiceInterface;

class MenuService implements MenuServiceInterface
{
    // constructor - inject MenuRepositoryInterface
    public function __construct(
        protected MenuRepositoryInterface $menuRepository   
    ) {}

    // method - ambil semua data Menu
    public function getAll(): Collection
    {
        return $this->menuRepository->getAll();
    }

    // method - ambil data Menu berdasarkan id
    public function findById(int $id): Menu
    {
        return $this->menuRepository->findById($id);
    }

    // method - buat data Menu baru
    public function create(array $data): Menu
    {
        return $this->menuRepository->create($data);
    }

    // method - update data Menu yang sudah ada
    public function update(Menu $menu, array $data): Menu
    {
        return $this->menuRepository->update($menu, $data);
    }

    // method - hapus data Menu
    public function delete(Menu $menu): void
    {
        $this->menuRepository->delete($menu);
    }
}