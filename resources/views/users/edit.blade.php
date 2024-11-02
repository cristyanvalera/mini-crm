<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">
                <div class="p-6 text-gray-900">
                    <div class="relative">
                        <form action="{{ route('users.update', $user) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <!-- First Name -->
                            <div>
                                <x-input-label :value="__('First Name')" for="first_name" />
                                <x-text-input
                                    :value="old('first_name', $user->first_name)"
                                    autocomplete="first_name"
                                    autofocus
                                    class="block mt-1 w-full"
                                    id="first_name"
                                    name="first_name"
                                    type="text"
                                />
                                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                            </div>

                            <!-- Last Name -->
                            <div class="mt-4">
                                <x-input-label :value="__('Last Name')" for="last_name" />
                                <x-text-input
                                    :value="old('last_name', $user->last_name)"
                                    autocomplete="last_name"
                                    autofocus
                                    class="block mt-1 w-full"
                                    id="last_name"
                                    name="last_name"
                                    type="text"
                                />
                                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label :value="__('Email')" for="email" />
                                <x-text-input
                                    :value="old('email', $user->email)"
                                    autocomplete="username"
                                    class="block mt-1 w-full"
                                    id="email"
                                    name="email"
                                    type="email"
                                />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

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
