<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use App\Http\Requests\{StoreTaskRequest, UpdateTaskRequest};
use App\Models\{Client, Project, Task, User};
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = Task::query()
            ->select('id', 'title', 'user_id', 'client_id', 'deadline_at', 'status')
            ->with('user:id,first_name,last_name', 'client:id,contact_name')
            ->latest('updated_at')
            ->paginate(5);

        return view('tasks.index', compact('tasks'));
    }

    public function create(): View
    {
        $users = User::query()->notAdmin()->select('id', 'first_name', 'last_name')->get();
        $clients = Client::query()->select('id', 'company_name')->get();
        $projects = Project::query()->select('id', 'title')->get();

        return view('tasks.create', compact('users', 'clients', 'projects'));
    }

    public function store(StoreTaskRequest $request): RedirectResponse
    {
        Task::query()->create($request->validated());

        return to_route('tasks.index');
    }

    public function edit(Task $task): View
    {
        $users = User::query()->notAdmin()->select('id', 'first_name', 'last_name')->get();
        $clients = Client::query()->select('id', 'company_name')->get();
        $projects = Project::query()->select('id', 'title')->get();

        return view('tasks.edit', compact('task', 'users', 'clients', 'projects'));
    }

    public function update(UpdateTaskRequest $request, Task $task): RedirectResponse
    {
        $task->update($request->validated());

        return to_route('tasks.index');
    }

    public function destroy(Task $task): RedirectResponse
    {
        Gate::authorize(PermissionEnum::DeleteTasks);

        $task->delete();

        return back();
    }
}
