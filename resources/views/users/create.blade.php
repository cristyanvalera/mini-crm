<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">
                <div class="p-6 text-gray-900">
                    <div class="w-full mx-auto sm:rounded-lg">
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf

                            <!-- First Name -->
                            <div>
                                <x-input-label :value="__('First Name')" for="first_name" />
                                <x-text-input
                                    :value="old('first_name')"
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
                                    :value="old('last_name')"
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
                                    :value="old('email')"
                                    autocomplete="username"
                                    class="block mt-1 w-full"
                                    id="email"
                                    name="email"
                                    type="email"
                                />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label :value="__('Password')" for="password" />

                                <x-text-input
                                    autocomplete="new-password"
                                    class="block mt-1 w-full"
                                    id="password"
                                    name="password"
                                    type="password"
                                />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-input-label :value="__('Confirm Password')" for="password_confirmation" />

                                <x-text-input
                                    autocomplete="new-password"
                                    class="block mt-1 w-full"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    type="password"
                                />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-link-button href="/users">
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
