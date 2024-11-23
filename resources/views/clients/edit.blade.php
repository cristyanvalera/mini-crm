<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Client') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">
                <div class="p-6 text-gray-900">
                    <div class="w-full mx-auto sm:rounded-lg">
                        <form method="POST" action="{{ route('clients.update', $client) }}">
                            @csrf
                            @method('PUT')

                            <!-- Contact Information -->
                            <div>
                                <h2 class="text-2xl mb-2">Contact Information</h2>

                                <!-- Contact Name -->
                                <div>
                                    <x-input-label for="contact_name" :value="__('Name')" />
                                    <x-text-input id="contact_name" class="block mt-1 w-full" type="text" name="contact_name" :value="old('contact_name', $client->contact_name)" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('contact_name')" class="mt-2" />
                                </div>

                                <!-- Contact Email -->
                                <div class="mt-4">
                                    <x-input-label for="contact_email" :value="__('Email')" />
                                    <x-text-input id="contact_email" class="block mt-1 w-full" type="email" name="contact_email" :value="old('contact_email', $client->contact_email)" required autocomplete="email" />
                                    <x-input-error :messages="$errors->get('contact_email')" class="mt-2" />
                                </div>

                                <!-- Contact Phonenumber -->
                                <div class="mt-4">
                                    <x-input-label for="contact_phone_number" :value="__('Phonenumber')" />
                                    <x-text-input id="contact_phone_number" class="block mt-1 w-full" type="tel" name="contact_phone_number" :value="old('contact_phone_number', $client->contact_phone_number)" required autocomplete="email" />
                                    <x-input-error :messages="$errors->get('contact_phone_number')" class="mt-2" />
                                </div>
                            </div>

                            <!-- Company Information -->
                            <div>
                                <h2 class="text-2xl mb-2 mt-4">Company Information</h2>

                                <!-- Company Name -->
                                <div>
                                    <x-input-label for="company_name" :value="__('Company')" />
                                    <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name', $client->company_name)" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                                </div>

                                <!-- Contact Address -->
                                <div class="mt-4">
                                    <x-input-label for="company_address" :value="__('Address')" />
                                    <x-text-input id="company_address" class="block mt-1 w-full" type="text" name="company_address" :value="old('company_address', $client->company_address)" required autocomplete="address" />
                                    <x-input-error :messages="$errors->get('company_address')" class="mt-2" />
                                </div>

                                <!-- Company City -->
                                <div class="mt-4">
                                    <x-input-label for="company_city" :value="__('City')" />
                                    <x-text-input id="company_city" class="block mt-1 w-full" type="text" name="company_city" :value="old('company_city', $client->company_city)" required autocomplete="city" />
                                    <x-input-error :messages="$errors->get('company_city')" class="mt-2" />
                                </div>

                                <!-- Company Zip -->
                                <div class="mt-4">
                                    <x-input-label for="company_zip" :value="__('Zip')" />
                                    <x-text-input id="company_zip" class="block mt-1 w-full" type="text" name="company_zip" :value="old('company_zip', $client->company_zip)" required autocomplete="zip" />
                                    <x-input-error :messages="$errors->get('company_zip')" class="mt-2" />
                                </div>

                                <!-- Company Vat -->
                                <div class="mt-4">
                                    <x-input-label for="company_vat" :value="__('Vat')" />
                                    <x-text-input id="company_vat" class="block mt-1 w-full" type="text" name="company_vat" :value="old('company_vat', $client->company_vat)" required autocomplete="vat" />
                                    <x-input-error :messages="$errors->get('company_vat')" class="mt-2" />
                                </div>
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

