@extends('dashboard')

@section('dashboard-content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-2xl font-semibold text-gray-800">Détails de la Chambre</h3>
            </div>
            
            <div class="p-6">
                <div class="mb-8">
                    <div class="space-y-3">
                        <p class="text-gray-700">Type: {{ $chambre->type->titre }}</p>
                        <p class="text-gray-700">Description: {{ $chambre->description }}</p>
                        <p class="text-gray-700">Superficie: {{ $chambre->superficie }}</p>
                        <p class="text-gray-700">Etage: {{ $chambre->etage }}</p>
                        <p class="text-gray-700">Description: {{ $chambre->description }}</p>
                        <p class="text-gray-700">Prix: {{ $chambre->prix }} DH /nuit</p>
                    </div>
                </div>

                <div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-4">Historique des Réservations</h4>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom du Client</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date d'Arrivée</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de Départ</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix Total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($chambre->reservations as $reservation)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $reservation->client->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $reservation->date_arrivee }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $reservation->date_departe }}</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ \Carbon\Carbon::parse($reservation->date_arrivee)->diffInDays(\Carbon\Carbon::parse($reservation->date_departe)) * $chambre->prix }} DH</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection