<x-guest-layout>
    <form action="{{ route('register') }}" method="POST">
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
                required
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
                required
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
                required
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
                required
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
                required
                type="password"
            />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}"
            >
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
