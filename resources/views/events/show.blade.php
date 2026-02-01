@extends('layouts.app')

@section('title', $event->title)

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-96 object-cover">
        
        <div class="p-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $event->title }}</h1>
            
            <div class="flex items-center space-x-6 text-gray-600 mb-6">
                <span><i class="fas fa-eye mr-2"></i>{{ $event->views }} vues</span>
                <span><i class="fas fa-calendar mr-2"></i>{{ $event->created_at->format('d/m/Y à H:i') }}</span>
            </div>

            <p class="text-gray-700 text-lg mb-6 leading-relaxed">{{ $event->description }}</p>

            <div class="flex space-x-4 mb-6">
                <a href="{{ $event->source_link }}" target="_blank" class="bg-pink-600 text-white px-6 py-3 rounded-lg hover:bg-pink-700 transition font-semibold">
                    <i class="fas fa-external-link-alt mr-2"></i>Voir la source
                </a>
                <a href="{{ route('events.index') }}" class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-400 transition font-semibold">
                    <i class="fas fa-arrow-left mr-2"></i>Retour
                </a>
            </div>

            <div class="border-t pt-4 flex space-x-2">
                <a href="{{ route('events.edit', $event) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-edit mr-1"></i>Modifier
                </a>
                <form action="{{ route('events.destroy', $event) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                        <i class="fas fa-trash mr-1"></i>Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection