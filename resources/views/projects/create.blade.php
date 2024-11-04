@use('App\Enums\ProjectStatus')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">
                <div class="p-6 text-gray-900">
                    <div class="w-full mx-auto sm:rounded-lg">
                        <form action="{{ route('projects.store') }}" method="POST">
                            @csrf

                            <!-- Title -->
                            <div>
                                <x-input-label :value="__('Title')" for="title" />
                                <x-text-input :value="old('title')" autocomplete="title" autofocus class="block mt-1 w-full" id="title" name="title" type="text" />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <!-- Description -->
                            <div class="mt-4">
                                <x-input-label :value="__('Description')" for="description" />
                                <textarea class="block mt-1 w-full border-gray-300 focus:border-indigo-500 rounded-md shadow-sm" id="description" name="description">{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <!-- Deadline -->
                            <div class="mt-4">
                                <x-input-label :value="__('Deadline')" for="deadline_at" />
                                <x-text-input :value="old('deadline_at')" class="block mt-1 w-full" id="deadline_at" name="deadline_at" type="date" />
                                <x-input-error :messages="$errors->get('deadline_at')" class="mt-2" />
                            </div>

                            <!-- User -->
                            <div class="mt-4">
                                <x-input-label :value="__('User')" for="user_id" />
                                <select name="user_id" id="user_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" @selected(old('user_id') === $user->id)>
                                            {{ $user->first_name }} {{ $user->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>

                            <!-- Client -->
                            <div class="mt-4">
                                <x-input-label :value="__('Client')" for="client_id" />
                                <select name="client_id" id="client_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}" @selected(old('client_id') === $client->id)>
                                            {{ $client->company_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>

                            <!-- Status -->
                            <div class="mt-4">
                                <x-input-label :value="__('Status')" for="status" />
                                <select name="status" id="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @foreach (ProjectStatus::cases() as $status)
                                        <option value="{{ $status->value }}" @selected(old('status') === $status->value)>
                                            {{ $status->value }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>

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

