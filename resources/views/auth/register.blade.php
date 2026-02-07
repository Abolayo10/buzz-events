@extends('layouts.app')

@section('title', 'Inscription')

@section('content')
<div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">

        <!-- En-tête -->
        <div class="bg-gradient-to-r from-purple-600 to-pink-600 p-8 text-center">
            <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-user-plus text-white text-3xl"></i>
            </div>
            <h1 class="text-2xl font-bold text-white">Créer un compte</h1>
            <p class="text-purple-200 text-sm mt-1">Rejoignez la communauté Buzz Events</p>
        </div>

        <!-- Formulaire -->
        <div class="p-8">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nom -->
                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2 text-sm">Nom</label>
                    <div class="relative">
                        <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="text" name="name" value="{{ old('name') }}"
                            placeholder="Votre nom"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 text-sm @error('name') border-red-500 @enderror"
                            required>
                    </div>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2 text-sm">Email</label>
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="email" name="email" value="{{ old('email') }}"
                            placeholder="votre@email.com"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 text-sm @error('email') border-red-500 @enderror"
                            required>
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Mot de passe -->
                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2 text-sm">Mot de passe</label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="password" name="password"
                            placeholder="Min. 8 caractères"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 text-sm @error('password') border-red-500 @enderror"
                            required>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirmation mot de passe -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2 text-sm">Confirmer le mot de passe</label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="password" name="password_confirmation"
                            placeholder="Répétez votre mot de passe"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 text-sm"
                            required>
                    </div>
                </div>

                <!-- Bouton inscription -->
                <button type="submit" class="w-full bg-purple-600 text-white py-3 rounded-lg hover:bg-purple-700 transition font-semibold">
                    <i class="fas fa-user-plus mr-2"></i> S'inscrire
                </button>
            </form>

            <!-- Lien connexion -->
            <div class="mt-6 text-center">
                <p class="text-gray-500 text-sm">
                    Déjà un compte ?
                    <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-800 font-semibold ml-1">Connectez-vous</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection