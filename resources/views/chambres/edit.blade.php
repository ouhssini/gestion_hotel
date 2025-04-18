@extends('dashboard')

@section('dashboard-content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="px-8 py-6 bg-gradient-to-r from-blue-600 to-blue-700">
                <h2 class="text-2xl font-bold text-white">Modifier la Chambre</h2>
                <p class="mt-1 text-blue-100">Modifiez les informations de la chambre ci-dessous</p>
            </div>
            
            @if ($errors->any())
                <div class="px-8 pt-6">
                    <div class="bg-red-50 border-l-4 border-red-400 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Plusieurs erreurs ont été trouvées :</h3>
                                <div class="mt-2 text-sm text-red-700">
                                    <ul class="list-disc pl-5 space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            
            <form method="POST" action="{{ route('chambres.update', $chambre->id) }}" class="px-8 py-6 space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-6">
                    <div class="space-y-2">
                        <label for="type" class="text-sm font-medium text-gray-700">Type de Chambre</label>
                        <select id="type" name="type_id" required class="block w-full px-4 py-3 rounded-lg border @error('type') border-red-300 @else border-gray-300 @enderror focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out">
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" {{ $chambre->type_id == $type->id ? 'selected' : '' }}>{{ $type->titre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label for="description" class="text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" name="description" rows="4" required 
                            class="block w-full px-4 py-3 rounded-lg border @error('description') border-red-300 @else border-gray-300 @enderror focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out"
                            placeholder="Entrez la description de la chambre...">{{ $chambre->description }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="superficier" class="text-sm font-medium text-gray-700">Superficie (m²)</label>
                            <div class="relative">
                                <input type="number" id="superficier" name="superficie" required 
                                    class="block w-full px-4 py-3 rounded-lg border @error('superficier') border-red-300 @else border-gray-300 @enderror focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out"
                                    placeholder="Entrez la superficie..." value="{{ $chambre->superficie }}">
                                <span class="absolute right-3 top-3 text-gray-400">m²</span>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="etage" class="text-sm font-medium text-gray-700">Étage</label>
                            <select id="etage" name="etage" required 
                                class="block w-full px-4 py-3 rounded-lg border @error('etage') border-red-300 @else border-gray-300 @enderror focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out">
                                <option value="RDC" {{ $chambre->etage == 'RDC' ? 'selected' : '' }}>Rez-de-chaussée</option>
                                <option value="1" {{ $chambre->etage == '1' ? 'selected' : '' }}>1er Étage</option>
                                <option value="2" {{ $chambre->etage == '2' ? 'selected' : '' }}>2ème Étage</option>
                                <option value="3" {{ $chambre->etage == '3' ? 'selected' : '' }}>3ème Étage</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="prix" class="text-sm font-medium text-gray-700">Prix par Nuit</label>
                        <div class="relative">
                            <input type="number" id="prix" name="prix" step="0.01" required 
                                class="block w-full px-4 py-3 pl-8 rounded-lg border @error('prix') border-red-300 @else border-gray-300 @enderror focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out"
                                placeholder="Entrez le prix..." value="{{ $chambre->prix }}">
                            <span class="absolute left-3 top-3 text-gray-400">€</span>
                        </div>
                    </div>
                </div>

                <div class="pt-6">
                    <button type="submit" 
                        class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-lg font-medium shadow-lg hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition-all duration-150 ease-in-out hover:scale-[1.02]">
                        Mettre à jour la Chambre
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
