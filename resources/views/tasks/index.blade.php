<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Tasks") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <a class="font-medium text-blue-700 dark:text-blue-600 hover:underline" href="{{ route("tasks.create") }}">Add new Task</a>

                        <table class="w-full text-sm text-left mt-4 text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-6 py-3" scope="col">Title</th>
                                    <th class="px-6 py-3" scope="col">Assigned to</th>
                                    <th class="px-6 py-3" scope="col">Client</th>
                                    <th class="px-6 py-3" scope="col">Deadline at</th>
                                    <th class="px-6 py-3" scope="col">Status</th>
                                    <th class="px-6 py-3" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            {{ Str::limit($task->title, 30) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $task->user->full_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $task->client->contact_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $task->deadline_at->diffForHumans() }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $task->status->label() }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a class="font-medium text-black dark:text-blue-500 hover:underline" href="{{ route("tasks.edit", $task) }}">Edit</a>
                                            @can(\App\Enums\PermissionEnum::DeleteTasks)
                                                |
                                                <form
                                                    class="inline-block"
                                                    method="post"
                                                    action="{{ route("tasks.destroy", $task) }}"
                                                    onsubmit="return confirm('Are you sure to delete this record? This action cannot be undome')"
                                                >
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="m-4">
                            {{ $tasks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
