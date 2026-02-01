@extends('layouts.app')

@section('title', 'Accueil - Buzz Events')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">
            <i class="fas fa-fire text-orange-500"></i> Événements Buzz
        </h1>
        <p class="text-gray-600">Découvrez les dernières tendances et actualités du web</p>
    </div>

    @if($events->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($events as $event)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition transform hover:-translate-y-1">
                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $event->title }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($event->description, 100) }}</p>
                        
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <span><i class="fas fa-eye mr-1"></i>{{ $event->views }} vues</span>
                            <span><i class="fas fa-calendar mr-1"></i>{{ $event->created_at->diffForHumans() }}</span>
                        </div>

                        <div class="flex space-x-2">
                            <a href="{{ route('events.show', $event) }}" class="flex-1 bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition text-center">
                                <i class="fas fa-eye mr-1"></i>Voir
                            </a>
                            <a href="{{ $event->source_link }}" target="_blank" class="flex-1 bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700 transition text-center">
                                <i class="fas fa-external-link-alt mr-1"></i>Source
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $events->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-xl">Aucun événement pour le moment</p>
            <a href="{{ route('events.create') }}" class="mt-4 inline-block bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition">
                Ajouter le premier événement
            </a>
        </div>
    @endif
</div>
@endsection