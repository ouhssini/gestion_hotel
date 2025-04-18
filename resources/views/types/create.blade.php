@extends('dashboard')

@section('dashboard-content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Create New Type</h2>
        
        @if ($errors->any())
            <div class="mb-4 bg-red-200 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('types.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div>
                <label for="titre" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                <input type="text" name="titre" id="titre" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('titre') border-red-500 @enderror"
                    value="{{ old('titre') }}"
                    required>
                @error('titre')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Photo</label>
                <input type="file" name="photo" id="photo" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('photo') border-red-500 @enderror"
                    accept="image/*"
                    >
                @error('photo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" 
                    style="background-color: #10B981;" 
                    class="text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Create Type
                </button>
            </div>
        </form>
    </div>
</div>
@endsection