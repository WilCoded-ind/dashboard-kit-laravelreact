<?php

namespace app\Providers;

use Illuminate\Support\ServiceProvider;

// repository
use App\Repositories\Contracts\RoleRepositoryInterface;
use App\Repositories\Contracts\MenuRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\PermissionRepositoryInterface;
use App\Repositories\RoleRepository;
use App\Repositories\MenuRepository;
use App\Repositories\UserRepository;
use App\Repositories\PermissionRepository;

// service
use App\Services\Contracts\RoleServiceInterface;
use App\Services\Contracts\MenuServiceInterface;
use App\Services\Contracts\UserServiceInterface;
use App\Services\Contracts\PermissionServiceInterface;
use App\Services\RoleService;
use App\Services\MenuService;
use App\Services\UserService;
use App\Services\PermissionService;



class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // repository bindings
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(MenuRepositoryInterface::class, MenuRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);

        // service bindings
        $this->app->bind(RoleServiceInterface::class, RoleService::class);
        $this->app->bind(MenuServiceInterface::class, MenuService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(PermissionServiceInterface::class, PermissionService::class);
    }
}
