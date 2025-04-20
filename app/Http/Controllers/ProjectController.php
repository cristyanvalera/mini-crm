<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use App\Http\Requests\{StoreProjectRequest, UpdateProjectRequest};
use App\Models\{Client, Project, User};
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::query()
            ->select('id', 'title', 'deadline_at', 'status', 'user_id', 'client_id')
            ->with(['user', 'client'])
            ->latest('updated_at')
            ->paginate(5);

        return view('projects.index', compact('projects'));
    }

    public function create(): View
    {
        $users = User::query()
            ->select('id', 'first_name', 'last_name')
            ->notAdmin()
            ->get();

        $clients = Client::query()
            ->select('id', 'company_name')
            ->get();

        return view('projects.create', compact('users', 'clients'));
    }

    public function store(StoreProjectRequest $request): RedirectResponse
    {
        Project::query()->create($request->validated());

        return to_route('projects.index');
    }

    public function edit(Project $project): View
    {
        $users = User::query()
            ->select('id', 'first_name', 'last_name')
            ->notAdmin()
            ->get();

        $clients = Client::query()
            ->select('id', 'company_name')
            ->pluck('company_name', 'id');

        return view('projects.edit', compact('project', 'users', 'clients'));
    }

    public function update(UpdateProjectRequest $request, Project $project): RedirectResponse
    {
        $project->update($request->validated());

        return to_route('projects.index');
    }

    public function destroy(Project $project): RedirectResponse
    {
        Gate::authorize(PermissionEnum::DeleteProjects);

        $project->delete();

        return back();
    }
}
