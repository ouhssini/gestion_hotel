@extends("dashboard")
@section("dashboard-content")
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
    
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Clients List</h2>
        <a href="{{ route('clients.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add New Client
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($clients as $client)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $client->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $client->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex space-x-2">
                            <a href="{{ route('clients.show', $client->id) }}" 
                               class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">
                                Show
                            </a>
                            <a href="{{ route('clients.edit', $client->id) }}" 
                               class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">
                                Edit
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection