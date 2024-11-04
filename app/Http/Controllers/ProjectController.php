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
        return view('projects.index', [
            'projects' => Project::query()
                ->with(['user', 'client'])
                ->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('projects.create', [
            'users' => User::select(['id', 'first_name', 'last_name'])->get(),
            'clients' => Client::select(['id', 'company_name'])->get(),
        ]);
    }

    public function store(StoreProjectRequest $request): RedirectResponse
    {
        Project::create($request->validated());

        return to_route('projects.index');
    }

    public function edit(Project $project): View
    {
        return view('projects.edit', [
            'project' => $project,
            'users' => User::select(['id', 'first_name', 'last_name'])->get(),
            'clients' => Client::select(['id', 'company_name'])->get(),
        ]);
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

        return to_route('projects.index');
    }
}
