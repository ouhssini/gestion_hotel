@extends('master')

@section('content')
<div class="flex flex-col min-h-screen bg-gradient-to-tr from-blue-100 via-blue-200 to-blue-300">
    <!-- Top Navbar -->
    <nav class="bg-indigo-700 shadow-md backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <span class="text-3xl font-bold text-white tracking-wide">Hotel Dashboard</span>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="p-2 rounded-full hover:bg-indigo-600 transition">
                        <i class="fas fa-bell text-white text-lg"></i>
                    </button>
                    <div class="relative">
                        <button class="flex items-center space-x-2 p-2 rounded-full hover:bg-indigo-600 transition">
                            <img class="h-9 w-9 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Admin&background=4f46e5&color=fff" alt="Profile">
                            <span class="text-white font-semibold">Admin</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside class="hidden md:flex md:flex-col md:w-64 bg-indigo-800 shadow-lg backdrop-blur-md">
            <div class="flex flex-col w-full h-full">
                <nav class="flex-1 px-4 py-6 space-y-4">
                    @foreach ([
                        ['icon' => 'home', 'label' => 'Dashboard', 'route' => 'dashboard'],
                        ['icon' => 'list', 'label' => 'Types', 'route' => 'types.index'],
                        ['icon' => 'bed', 'label' => 'Chambres', 'route' => 'chambres.index'],
                        ['icon' => 'users', 'label' => 'Clients', 'route' => 'clients.index'],
                        ['icon' => 'calendar-alt', 'label' => 'Reservations', 'route' => 'reservations.index'],
                    ] as $item)
                        <a href="{{ route($item['route']) }}" 
                           class="flex items-center px-4 py-3 
                           {{ Request::routeIs($item['route']) ? 'bg-purple-600 text-white' : 'text-indigo-200 hover:bg-purple-600 hover:text-white' }} 
                           rounded-lg transition-all transform hover:scale-105 group">
                            <i class="fas fa-{{ $item['icon'] }} text-lg w-6 group-hover:text-white"></i>
                            <span class="ml-3 font-medium text-md">{{ $item['label'] }}</span>
                        </a>
                    @endforeach
                </nav>

                <!-- Logout -->
                <div class="px-4 py-6 border-t border-indigo-700">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center px-4 py-3 text-red-300 hover:bg-red-600 hover:text-white rounded-lg transition-all transform hover:scale-105 group">
                            <i class="fas fa-sign-out-alt text-lg w-6 group-hover:text-white"></i>
                            <span class="ml-3 font-medium text-md">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto p-8">
            <div class="container mx-auto">
                @yield('dashboard-content')
            </div>
        </main>
    </div>
</div>

<!-- Custom Scrollbar -->
<style>
/* Custom scrollbar */
::-webkit-scrollbar {
    width: 8px;
}
::-webkit-scrollbar-thumb {
    background: #6366f1; /* purple-500 */
    border-radius: 4px;
}
::-webkit-scrollbar-track {
    background: #e0e7ff; /* light indigo */
}
</style>

@endsection
