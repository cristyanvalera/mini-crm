<?php

namespace App\Http\Controllers;

use App\Http\Requests\{StoreProjectRequest, UpdateProjectRequest};
use App\Models\{Client, Project, User};
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::query()->orderBy('id')->paginate(5);

        return view('projects.index', compact('projects'));
    }

    public function create(): View
    {
        $users = User::query()
            ->select('id', 'first_name', 'last_name')
            ->where('email', '!=', 'admin@admin.com')
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
            ->where('email', '!=', 'admin@admin.com')
            ->get();

        $clients = Client::query()
            ->select('id', 'company_name')
            ->get();

        return view('projects.edit', compact('project', 'users', 'clients'));
    }

    public function update(UpdateProjectRequest $request, Project $project): RedirectResponse
    {
        $project->update($request->validated());

        return to_route('projects.index');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        return back();
    }
}
