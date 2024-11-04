<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use App\Http\Requests\{UsersCreateRequest, UsersUpdateRequest};
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('users.index', [
            'users' => User::paginate(),
        ]);
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(UsersCreateRequest $request): RedirectResponse
    {
        User::create($request->validated());

        return to_route('users.index');
    }

    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function update(UsersUpdateRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        return to_route('users.index');
    }

    public function destroy(User $user): RedirectResponse
    {
        Gate::authorize(PermissionEnum::ManageUsers);

        $user->delete();

        return to_route('users.index');
    }
}
