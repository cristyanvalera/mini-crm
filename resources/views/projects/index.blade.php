<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <a class="font-medium text-blue-700 dark:text-blue-600 hover:underline" href="{{ route('projects.create') }}">
                            Add new Project
                        </a>

                        <table class="w-full text-sm text-left mt-4 text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-6 py-3" scope="col">
                                        Title
                                    </th>
                                    <th class="px-6 py-3" scope="col">
                                        Assign to
                                    </th>
                                    <th class="px-6 py-3" scope="col">
                                        Client
                                    </th>
                                    <th class="px-6 py-3" scope="col">
                                        Deadline at
                                    </th>
                                    <th class="px-6 py-3" scope="col">
                                        Status
                                    </th>
                                    <th class="px-6 py-3" scope="col">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            {{ $project->title }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $project->user->full_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $project->client->contact_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $project->deadline_at->diffForHumans() }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $project->status->label() }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a class="font-medium text-black  dark:text-blue-500 hover:underline"
                                                href="{{ route('projects.edit', $project) }}"
                                            >
                                                Edit
                                            </a>
                                            @can(\App\Enums\PermissionEnum::DeleteProjects)
                                                |
                                                <form
                                                    class="inline-block"
                                                    method="post"
                                                    action="{{ route('projects.destroy', $project) }}"
                                                    onsubmit="return confirm('Are you sure to delete this record? This action cannot be undome')"
                                                >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:underline">
                                                        Delete
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="m-4">
                            {{ $projects->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
