<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $person->first_name }} {{ $person->last_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium">Informations personnelles</h3>
                        <p><strong>Nom :</strong> {{ $person->last_name }}</p>
                        <p><strong>Prénom :</strong> {{ $person->first_name }}</p>
                        <p><strong>Date de naissance :</strong> {{ $person->birth_date ?? 'Non renseignée' }}</p>
                        <p><strong>Date de décès :</strong> {{ $person->death_date ?? 'Non renseignée' }}</p>
                        <p><strong>Ajouté par :</strong> {{ $person->creator->name ?? 'Inconnu' }}</p>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-medium">Parents</h3>
                        @if($person->parents->count() > 0)
                            <ul class="list-disc pl-5">
                                @foreach($person->parents as $parent)
                                    <li>
                                        <a href="{{ route('people.show', $parent->id) }}" class="text-blue-600 hover:underline">
                                            {{ $parent->first_name }} {{ $parent->last_name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>Aucun parent enregistré.</p>
                        @endif
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-medium">Enfants</h3>
                        @if($person->children->count() > 0)
                            <ul class="list-disc pl-5">
                                @foreach($person->children as $child)
                                    <li>
                                        <a href="{{ route('people.show', $child->id) }}" class="text-blue-600 hover:underline">
                                            {{ $child->first_name }} {{ $child->last_name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>Aucun enfant enregistré.</p>
                        @endif
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('people.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Retour à la liste
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
