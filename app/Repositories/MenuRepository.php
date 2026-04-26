<?php

namespace App\Repositories;

use App\Models\Menu;
use App\Repositories\Contracts\MenuRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class MenuRepository implements MenuRepositoryInterface
{
    // method - ambil semua data menu 
    public function getAll(array $params): LengthAwarePaginator
    {
        return Menu::with('children')
            ->whereNull('parent_id')
            ->when($params['search'] ?? null, fn($q, $search) =>
                $q->where('name', 'like', "%$search%")
                    ->orWhere('url', 'like', "%$search%")
            )
            ->orderBy($params['sort'] ?? 'id', $params['direction'] ?? 'asc')
            ->paginate($params['per_page'] ?? 10);
    }

    // method - ambil data menu berdasarkan id
    public function findById(int $id): Menu
    {
        return Menu::findOrFail($id);
    }

    // method - buat data menu baru
    public function create(array $data): Menu
    {
        return Menu::create($data);
    }

    // method - update data menu yang sudah ada
    public function update(Menu $menu, array $data): Menu
    {
        $menu->update($data);
        return $menu;
    }

    // method - hapus data menu
    public function delete(Menu $menu): void
    {
        $menu->delete();
    }
}
