@extends('dashboard')

@section('dashboard-content')
    <div class="container mx-auto px-4 py-8">
        @if (session('success'))
            <div class="mb-4 bg-green-200 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 bg-red-200 border border-red-400 text-red-700 px-4 py-3 rounded">
                {{ session('error') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white rounded px-2 pt-5 shadow"> 
<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-bold text-gray-800">Liste des Chambres</h2>
    <a href="{{ route('chambres.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Ajouter une chambre
    </a>
</div>
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Type</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Description</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Superficie</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Etage</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Prix</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($chambres as $chambre)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $chambre->id }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $chambre->type->titre }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $chambre->description }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $chambre->superficie }} m²</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $chambre->etage }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $chambre->prix }} DH</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex space-x-2">
                                    <a href="{{ route('chambres.show', $chambre->id) }}" class="text-blue-600 hover:text-blue-900">Afficher</a>
                                    <a href="{{ route('chambres.edit', $chambre->id) }}" class="text-yellow-600 hover:text-yellow-900">Modifier</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
