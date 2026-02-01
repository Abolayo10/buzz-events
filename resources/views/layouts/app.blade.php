<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Buzz Events')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-gradient-to-r from-purple-600 to-pink-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('events.index') }}" class="text-white text-2xl font-bold">
                        <i class="fas fa-fire-alt mr-2"></i>Buzz Events
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('events.index') }}" class="text-white hover:text-pink-200 transition">
                        <i class="fas fa-home mr-1"></i>Accueil
                    </a>
                    <a href="{{ route('events.create') }}" class="bg-white text-purple-600 px-4 py-2 rounded-full hover:bg-pink-100 transition font-semibold">
                        <i class="fas fa-plus mr-1"></i>Ajouter
                    </a>
                    <a href="{{ route('about') }}" class="text-white hover:text-pink-200 transition">
                        <i class="fas fa-info-circle mr-1"></i>À propos
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Messages flash -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <!-- Contenu -->
    <main class="py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2026 Buzz Events - Restez connecté aux tendances du web</p>
        </div>
    </footer>
</body>
</html>