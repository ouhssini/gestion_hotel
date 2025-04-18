@extends('dashboard')

@section('dashboard-content')
    <div class="container mx-auto px-4 py-8">
        @if (session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                {{ session('error') }}
            </div>
        @endif

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Liste des Réservations</h2>
            <a href="{{ route('reservations.create') }}" 
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow">
                Ajouter une réservation
            </a>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Chambre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date d'arrivée</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de départ</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th> <!-- New Column -->
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($reservations as $reservation)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->client->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->chambre->description }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($reservation->date_arrivee)->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($reservation->date_departe)->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                                <a href="{{ route('reservations.edit', $reservation->id) }}"
                                    class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-1 px-3 rounded-lg text-sm">
                                    Éditer
                                </a>

                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded-lg text-sm">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">Aucune réservation trouvée.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
