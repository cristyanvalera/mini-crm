<?php

namespace App\Http\Controllers;

use App\Http\Requests\{StoreTaskRequest, UpdateTaskRequest};
use App\Models\{Client, Project, Task, User};
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        return view('tasks.index', [
            'tasks' => Task::query()
                ->select(['id', 'title', 'description', 'status', 'deadline_at'])
                ->paginate(10),
        ]);
    }

    public function create(): View
    {
        $users = User::select(['id', 'first_name', 'last_name'])->get();
        $clients = Client::select(['id', 'company_name'])->get();
        $projects = Project::select(['id', 'title'])->get();

        return view('tasks.create', compact('users', 'clients', 'projects'));
    }

    public function store(StoreTaskRequest $request): RedirectResponse
    {
        Task::create($request->validated());

        return to_route('tasks.index');
    }

    public function edit(Task $task): View
    {
        $users = User::select(['id', 'first_name', 'last_name'])->get();
        $clients = Client::select(['id', 'company_name'])->get();
        $projects = Project::select(['id', 'title'])->get();

        return view('tasks.edit', compact('task', 'users', 'clients', 'projects'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return to_route('tasks.index');
    }
}
