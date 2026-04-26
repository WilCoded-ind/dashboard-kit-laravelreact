<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\Contracts\RoleServiceInterface;
use App\Services\Contracts\UserServiceInterface;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function __construct(
        protected UserServiceInterface $userService,
        protected RoleServiceInterface $roleService,
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('users/index', [
            'users'     => $this->userService->getAll(request()->all()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('users/create',[
            'roles'     => $this->roleService->getAll([]),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $this->userService->create($request->validated());

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): Response
    {
        return Inertia::render('users/show', [
            'user'      => $user->load('role'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return Inertia::render('users/edit', [
            'user'      => $user,
            'role'      => $this->roleService->getAll([])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->userService->update($user, $request->validated());

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->userService->delete($user);

        return redirect()->route('users.index');
    }
}
