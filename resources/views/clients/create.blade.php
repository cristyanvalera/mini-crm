<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Client') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">
                <div class="p-6 text-gray-900">
                    <div class="w-full mx-auto sm:rounded-lg">
                        <form action="{{ route('clients.store') }}" method="POST">
                            @csrf

                            <div>
                                <h2 class="text-2xl mb-2">Contact Information</h2>

                                <!-- Contact Name -->
                                <div>
                                    <x-input-label :value="__('Name')" for="contact_name" />

                                    <x-text-input
                                        :value="old('contact_name')"
                                        autocomplete="contact_name"
                                        autofocus
                                        class="block mt-1 w-full"
                                        id="contact_name"
                                        name="contact_name"
                                        type="text"
                                    />

                                    <x-input-error :messages="$errors->get('contact_name')" class="mt-2" />
                                </div>

                                <!-- Contact Email -->
                                <div class="mt-4">
                                    <x-input-label :value="__('Email')" for="contact_email" />

                                    <x-text-input
                                        :value="old('contact_email')"
                                        autocomplete="contact_email"
                                        class="block mt-1 w-full"
                                        id="contact_email"
                                        name="contact_email"
                                        type="email"
                                    />

                                    <x-input-error :messages="$errors->get('contact_email')" class="mt-2" />
                                </div>

                                <!-- Phone number -->
                                <div class="mt-4">
                                    <x-input-label :value="__('Phone number')" for="contact_phone_number" />

                                    <x-text-input
                                        :value="old('contact_phone_number')"
                                        autocomplete="phone_number"
                                        class="block mt-1 w-full"
                                        id="contact_phone_number"
                                        name="contact_phone_number"
                                        type="tel"
                                    />

                                    <x-input-error :messages="$errors->get('contact_phone_number')" class="mt-2" />
                                </div>
                            </div>

                            <div>
                                <h2 class="text-2xl mb-2 mt-4">Company Information</h2>

                                <!-- Company Name -->
                                <div>
                                    <x-input-label :value="__('Company')" for="company_name" />

                                    <x-text-input
                                        :value="old('company_name')"
                                        autocomplete="company_name"
                                        autofocus
                                        class="block mt-1 w-full"
                                        id="company_name"
                                        name="company_name"
                                        type="text"
                                    />

                                    <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                                </div>

                                <!-- Company Address -->
                                <div class="mt-4">
                                    <x-input-label :value="__('Address')" for="company_address" />
                                    <x-text-input
                                        :value="old('company_address')"
                                        autocomplete="company_address"
                                        class="block mt-1 w-full"
                                        id="company_address"
                                        name="company_address"
                                        type="text"
                                    />
                                    <x-input-error :messages="$errors->get('company_address')" class="mt-2" />
                                </div>

                                <!-- Company City -->
                                <div class="mt-4">
                                    <x-input-label :value="__('City')" for="company_city" />
                                    <x-text-input
                                        :value="old('company_city')"
                                        autocomplete="company_city"
                                        class="block mt-1 w-full"
                                        id="company_city"
                                        name="company_city"
                                        type="text"
                                    />
                                    <x-input-error :messages="$errors->get('company_city')" class="mt-2" />
                                </div>

                                <!-- Company Zip -->
                                <div class="mt-4">
                                    <x-input-label :value="__('Zip Code')" for="company_zip" />
                                    <x-text-input
                                        :value="old('company_zip')"
                                        autocomplete="company_zip"
                                        class="block mt-1 w-full"
                                        id="company_zip"
                                        name="company_zip"
                                        type="text"
                                    />
                                    <x-input-error :messages="$errors->get('company_zip')" class="mt-2" />
                                </div>

                                <!-- Company Vat -->
                                <div class="mt-4">
                                    <x-input-label :value="__('VAT')" for="company_vat" />
                                    <x-text-input
                                        :value="old('company_vat')"
                                        autocomplete="company_vat"
                                        class="block mt-1 w-full"
                                        id="company_vat"
                                        name="company_vat"
                                        type="text"
                                    />
                                    <x-input-error :messages="$errors->get('company_vat')" class="mt-2" />
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-link-button href="/clients">
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
