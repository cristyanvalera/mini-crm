@use('App\Enums\TaskStatus')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }} # {{ $task->id }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">
                <div class="p-6 text-gray-900">
                    <div class="w-full mx-auto sm:rounded-lg">
                        <form method="POST" action="{{ route('tasks.update', $task) }}">
                            @csrf
                            @method('PUT')

                            <!-- Title -->
                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $task->title)"  autofocus autocomplete="title" />
                                <x-input-error :messages="$errors->get('title')" class="mt-2 font-bold" />
                            </div>

                            <!-- Description -->
                            <div class="mt-4">
                                <x-input-label for="description" :value="__('Description')" />
                                <x-textarea-input id="description" name="description" class="block mt-1 w-full"  autocomplete="description">{{ old('description', $task->description) }}</x-textarea-input>
                                <x-input-error :messages="$errors->get('description')" class="mt-2 font-bold" />
                            </div>

                            <!-- Assigned User -->
                            <div class="mt-4">
                                <x-input-label for="user_id" :value="__('Assigned User')" />
                                <select name="user_id" id="user_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">...</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" @selected(old('user_id', $task->user_id) === $user->id)>
                                            {{ $user->first_name }} {{ $user->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('user_id')" class="mt-2 font-bold" />
                            </div>

                            <!-- Assigned Client -->
                            <div class="mt-4">
                                <x-input-label for="client_id" :value="__('Assigned Client')" />
                                <select name="client_id" id="client_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">...</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}" @selected(old('client_id', $task->client_id) === $client->id)>
                                            {{ $client->company_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('client_id')" class="mt-2 font-bold" />
                            </div>

                            <!-- Assigned Project -->
                            <div class="mt-4">
                                <x-input-label for="project_id" :value="__('Assigned Project')" />
                                <select name="project_id" id="project_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">...</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}" @selected(old('project_id', $task->project_id) === $project->id)>
                                            {{ $project->title }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('project_id')" class="mt-2 font-bold" />
                            </div>

                            <!-- Deadline -->
                            <div class="mt-4">
                                <x-input-label for="deadline_at" :value="__('Deadline at')" />
                                <x-text-input id="deadline_at" class="block mt-1 w-full" type="date" name="deadline_at" :value="old('deadline_at', $task->deadline_at)"  />
                                <x-input-error :messages="$errors->get('deadline_at')" class="mt-2 font-bold" />
                            </div>

                            <!-- Status -->
                            <div class="mt-4">
                                <x-input-label for="status" :value="__('Status')" />
                                <select name="status" id="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">...</option>
                                    @foreach (TaskStatus::cases() as $status)
                                        <option value="{{ $status->value }}" @selected(old('status', $task->status->value) === $status->value)>
                                            {{ $status->label() }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2 font-bold" />
                            </div>

                            <!-- Buttons -->
                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ms-4">
                                    {{ __('Save') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
