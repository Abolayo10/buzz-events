<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Buzz Events')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <!-- Navigation -->
    <nav class="bg-gradient-to-r from-purple-600 to-pink-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">

                <!-- Logo -->
                <a href="{{ route('events.index') }}" class="text-white text-xl font-bold flex items-center">
                    <i class="fas fa-fire-alt mr-2"></i>
                    <span class="hidden sm:inline">Buzz Events</span>
                </a>

                <!-- Menu Desktop -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('events.index') }}" class="text-white hover:text-pink-200 transition flex items-center">
                        <i class="fas fa-home mr-1"></i> Accueil
                    </a>
                    <a href="{{ route('events.create') }}" class="bg-white text-purple-600 px-4 py-2 rounded-full hover:bg-pink-100 transition font-semibold flex items-center">
                        <i class="fas fa-plus mr-1"></i> Ajouter
                    </a>
                    <a href="{{ route('about') }}" class="text-white hover:text-pink-200 transition flex items-center">
                        <i class="fas fa-info-circle mr-1"></i> À propos
                    </a>
                </div>

                <!-- Bouton Menu Mobile -->
                <button id="menuToggle" class="md:hidden text-white focus:outline-none">
                    <i id="menuIcon" class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div id="mobileMenu" class="hidden md:hidden bg-gradient-to-r from-purple-700 to-pink-700 px-4 pb-4">
            <a href="{{ route('events.index') }}" class="block text-white py-2 hover:text-pink-200 transition border-b border-white border-opacity-20">
                <i class="fas fa-home mr-2"></i> Accueil
            </a>
            <a href="{{ route('events.create') }}" class="block text-white py-2 hover:text-pink-200 transition border-b border-white border-opacity-20">
                <i class="fas fa-plus mr-2"></i> Ajouter un événement
            </a>
            <a href="{{ route('about') }}" class="block text-white py-2 hover:text-pink-200 transition">
                <i class="fas fa-info-circle mr-2"></i> À propos
            </a>
        </div>
    </nav>

    <!-- Messages flash -->
    @if(session('success'))
        <div class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative flex items-center justify-between" role="alert">
                <span class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('success') }}
                </span>
                <button onclick="this.parentElement.parentElement.style.display='none'" class="text-green-700 hover:text-green-900">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    @endif

    <!-- Contenu principal -->
    <main class="flex-1 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-auto">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-3 md:space-y-0">
                <p class="text-gray-400 text-sm text-center md:text-left">
                    &copy; 2026 Buzz Events - Restez connecté aux tendances du web
                </p>
                <div class="flex space-x-4">
                    <a href="{{ route('events.index') }}" class="text-gray-400 hover:text-white transition text-sm">Accueil</a>
                    <a href="{{ route('events.create') }}" class="text-gray-400 hover:text-white transition text-sm">Ajouter</a>
                    <a href="{{ route('about') }}" class="text-gray-400 hover:text-white transition text-sm">À propos</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Script Menu Mobile -->
    <script>
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        const menuIcon = document.getElementById('menuIcon');

        menuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            menuIcon.classList.toggle('fa-bars');
            menuIcon.classList.toggle('fa-times');
        });
    </script>
</body>
</html>