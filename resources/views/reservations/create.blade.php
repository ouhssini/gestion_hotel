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

        <div class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4">
            <h2 class="text-3xl font-bold mb-6 text-gray-800">Nouvelle Réservation</h2>

            <form action="{{ route('reservations.store') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="client_id" class="block text-gray-700 text-sm font-semibold mb-2">
                        Client
                    </label>
                    <select name="user_id" id="client_id"
                        class="block w-full border @error('user_id') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">Sélectionnez un client</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}" {{ old('user_id') == $client->id ? 'selected' : '' }}>
                                {{ $client->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="chambre_id" class="block text-gray-700 text-sm font-semibold mb-2">
                        Chambre
                    </label>
                    <select name="chambre_id" id="chambre_id"
                        class="block w-full border @error('chambre_id') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">Sélectionnez une chambre</option>
                        @foreach ($chambres as $chambre)
                            <option value="{{ $chambre->id }}" {{ old('chambre_id') == $chambre->id ? 'selected' : '' }}>
                                Chambre {{ $chambre->description }}
                            </option>
                        @endforeach
                    </select>
                    @error('chambre_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 flex flex-wrap -mx-2">
                    <div class="w-full md:w-1/2 px-2 mb-4 md:mb-0">
                        <label for="date_arrivee" class="block text-gray-700 text-sm font-semibold mb-2">
                            Date d'arrivée
                        </label>
                        <input type="date" name="date_arrivee" id="date_arrivee" value="{{ old('date_arrivee') }}"
                            class="block w-full border @error('date_arrivee') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        @error('date_arrivee')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full md:w-1/2 px-2">
                        <label for="date_depart" class="block text-gray-700 text-sm font-semibold mb-2">
                            Date de départ
                        </label>
                        <input type="date" name="date_departe" id="date_depart" value="{{ old('date_departe') }}"
                            class="block w-full border @error('date_depart') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        @error('date_depart')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Créer la réservation
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
