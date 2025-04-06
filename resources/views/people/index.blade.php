<x-guest-layout>
    @include('layouts.navigation')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-8">
                        <h1 class="text-3xl font-bold text-gray-800">Liste des personnes</h1>
                    </div>

                    @if(isset($people) && $people->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full text-base border-collapse">
                                <thead>
                                <tr class="bg-gray-100 border-b-2 border-gray-300">
                                    <th scope="col" class="py-4 px-6 text-left font-semibold text-gray-700">ID</th>
                                    <th scope="col" class="py-4 px-6 text-left font-semibold text-gray-700">Nom</th>
                                    <th scope="col" class="py-4 px-6 text-left font-semibold text-gray-700">Prénom</th>
                                    <th scope="col" class="py-4 px-6 text-left font-semibold text-gray-700">Date de naissance</th>
                                    <th scope="col" class="py-4 px-6 text-left font-semibold text-gray-700">Créé par</th>
                                    @auth
                                        <th scope="col" class="py-4 px-6 text-left font-semibold text-gray-700">Actions</th>
                                    @endauth
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($people as $person)
                                    <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} hover:bg-blue-50 transition-colors duration-150">
                                        <td class="py-4 px-6 border-b">{{ $person->id }}</td>
                                        <td class="py-4 px-6 border-b font-medium">{{ $person->last_name ?? 'Non défini' }}</td>
                                        <td class="py-4 px-6 border-b">{{ $person->first_name ?? 'Non défini' }}</td>
                                        <td class="py-4 px-6 border-b">
                                            @if($person->date_of_birth)
                                                <span class="font-medium text-gray-700">
                                                    {{ \Carbon\Carbon::parse($person->date_of_birth)->locale('fr')->isoFormat('LL') }}
                                                </span>
                                            @else
                                                <span class="text-gray-400">Non défini</span>
                                            @endif
                                        </td>
                                        <td class="py-4 px-6 border-b">{{ $person->creator ?? 'Inconnu' }}</td>
                                        @auth
                                            <td class="py-4 px-6 border-b">
                                                <div class="flex space-x-2">
                                                    <a href="#" class="text-blue-600 hover:text-blue-800">Voir</a>
                                                    <a href="#" class="text-yellow-600 hover:text-yellow-800">Modifier</a>
                                                </div>
                                            </td>
                                        @endauth
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="flex items-center justify-center py-12 bg-gray-50 rounded-lg border border-gray-200">
                            <p class="text-gray-500 text-lg">Aucune personne trouvée</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
