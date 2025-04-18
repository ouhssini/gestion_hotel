@extends('dashboard')

@section('dashboard-content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-gray-800 mb-8">Tableau de Bord</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Chambres -->
        <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center">
            <div class="text-blue-600 mb-4">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 10h18M3 6h18M4 14h16v6H4z" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h2 class="text-2xl font-bold">{{ $chambresCount }}</h2>
            <p class="text-gray-500">Chambres</p>
        </div>

        <!-- Types -->
        <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center">
            <div class="text-green-600 mb-4">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9.75 17L15.25 12 9.75 7V17Z" fill="currentColor"/>
                </svg>
            </div>
            <h2 class="text-2xl font-bold">{{ $typesCount }}</h2>
            <p class="text-gray-500">Types</p>
        </div>

        <!-- Clients -->
        <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center">
            <div class="text-purple-600 mb-4">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 3.13a4 4 0 010 7.75M8 3.13a4 4 0 000 7.75" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h2 class="text-2xl font-bold">{{ $clientsCount }}</h2>
            <p class="text-gray-500">Clients</p>
        </div>

        <!-- Réservations -->
        <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center">
            <div class="text-red-600 mb-4">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M8 7V3m8 4V3m-9 8h10m-10 4h6m4 5H5a2 2 0 01-2-2V7a2 2 0 012-2h1" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h2 class="text-2xl font-bold">{{ $reservationsCount }}</h2>
            <p class="text-gray-500">Réservations</p>
        </div>
    </div>
</div>
@endsection
