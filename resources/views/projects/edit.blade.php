@use('App\Enums\StatusProject')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Project') }} # {{ $project->id }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">
                <div class="p-6 text-gray-900">
                    <div class="w-full mx-auto sm:rounded-lg">
                        <form method="POST" action="{{ route('projects.update', $project) }}">
                            @csrf
                            @method('PUT')

                            <!-- Title -->
                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $project->title)"  autofocus autocomplete="title" />
                                <x-input-error :messages="$errors->get('title')" class="mt-2 font-bold" />
                            </div>

                            <!-- Description -->
                            <div class="mt-4">
                                <x-input-label for="description" :value="__('Description')" />
                                <x-textarea-input id="description" name="description" class="block mt-1 w-full"  autocomplete="description">{{ old('description', $project->description) }}</x-textarea-input>
                                <x-input-error :messages="$errors->get('description')" class="mt-2 font-bold" />
                            </div>

                            <!-- Deadline -->
                            <div class="mt-4">
                                <x-input-label for="deadline_at" :value="__('Deadline at')" />
                                <x-text-input id="deadline_at" class="block mt-1 w-full" type="date" name="deadline_at" :value="old('deadline_at', $project->deadline_at)"  />
                                <x-input-error :messages="$errors->get('deadline_at')" class="mt-2 font-bold" />
                            </div>

                            <!-- User -->
                            <div class="mt-4">
                                <x-input-label for="user_id" :value="__('User')" />
                                <select name="user_id" id="user_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">{{ __('Select a user') }}</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" @selected(old('user_id', $project->user_id) === $user->id)>
                                            {{ $user->first_name }} {{ $user->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('user_id')" class="mt-2 font-bold" />
                            </div>

                            <!-- Client -->
                            <div class="mt-4">
                                <x-input-label for="client_id" :value="__('Client')" />
                                <select name="client_id" id="client_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">{{ __('Select a client') }}</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}" @selected(old('client_id', $project->client_id) === $client->id)>
                                            {{ $client->company_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('client_id')" class="mt-2 font-bold" />
                            </div>

                            <!-- Status -->
                            <div class="mt-4">
                                <x-input-label for="status" :value="__('Status')" />
                                <select name="status" id="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">...</option>
                                    @foreach (StatusProject::cases() as $status)
                                        <option value="{{ $status->value }}" @selected(old('status', $project->status->value) === $status->value)>
                                            {{ $status->label() }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2 font-bold" />
                            </div>

                            <!-- Buttons -->
                            <div class="flex items-center justify-end mt-4">
                                <x-link-button href="{{ route('projects.index') }}">
                                    {{ __('Back') }}
                                </x-link-button>

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
