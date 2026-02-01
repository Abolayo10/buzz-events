@extends('layouts.app')

@section('title', 'Modifier un événement')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow-lg p-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">
            <i class="fas fa-edit text-blue-600"></i> Modifier l'événement
        </h2>

        <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Titre *</label>
                <input type="text" name="title" value="{{ old('title', $event->title) }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 @error('title') border-red-500 @enderror" 
                    required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Image actuelle</label>
                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="w-48 h-32 object-cover rounded mb-2">
                <label class="block text-gray-700 font-semibold mb-2 mt-4">Nouvelle image (optionnelle)</label>
                <input type="file" name="image" accept="image/*" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 @error('image') border-red-500 @enderror">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Description (max 250 caractères) *</label>
                <textarea name="description" rows="4" maxlength="250"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 @error('description') border-red-500 @enderror" 
                    required>{{ old('description', $event->description) }}</textarea>
                <p class="text-gray-500 text-sm mt-1" id="charCount">{{ strlen($event->description) }} / 250 caractères</p>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Lien source *</label>
                <input type="url" name="source_link" value="{{ old('source_link', $event->source_link) }}" 
                    placeholder="https://example.com"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 @error('source_link') border-red-500 @enderror" 
                    required>
                @error('source_link')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="flex-1 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                    <i class="fas fa-save mr-2"></i>Mettre à jour
                </button>
                <a href="{{ route('events.show', $event) }}" class="flex-1 bg-gray-300 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-400 transition font-semibold text-center">
                    <i class="fas fa-times mr-2"></i>Annuler
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    const textarea = document.querySelector('textarea[name="description"]');
    const charCount = document.getElementById('charCount');
    
    textarea.addEventListener('input', function() {
        charCount.textContent = `${this.value.length} / 250 caractères`;
    });
</script>
@endsection