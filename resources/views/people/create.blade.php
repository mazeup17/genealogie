<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une nouvelle personne') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('people.store') }}">
                        @csrf

                        <!-- Prénom -->
                        <div class="mt-4">
                            <x-input-label for="first_name" :value="__('Prénom')" />
                            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>

                        <!-- Seconds prénoms -->
                        <div class="mt-4">
                            <x-input-label for="middle_names" :value="__('Autres prénoms')" />
                            <x-text-input id="middle_names" class="block mt-1 w-full" type="text" name="middle_names" :value="old('middle_names')" />
                            <x-input-error :messages="$errors->get('middle_names')" class="mt-2" />
                        </div>

                        <!-- Nom -->
                        <div class="mt-4">
                            <x-input-label for="last_name" :value="__('Nom')" />
                            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required />
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>

                        <!-- Nom de naissance -->
                        <div class="mt-4">
                            <x-input-label for="birth_name" :value="__('Nom de naissance')" />
                            <x-text-input id="birth_name" class="block mt-1 w-full" type="text" name="birth_name" :value="old('birth_name')" />
                            <x-input-error :messages="$errors->get('birth_name')" class="mt-2" />
                        </div>

                        <!-- Date de naissance -->
                        <div class="mt-4">
                            <x-input-label for="date_of_birth" :value="__('Date de naissance')" />
                            <x-text-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth')" />
                            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                        </div>


                        <div class="flex items-center justify-start mt-6">
                            <x-primary-button class="mr-4">
                                {{ __('Créer') }}
                            </x-primary-button>

                            <a href="{{ route('people.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Annuler') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
