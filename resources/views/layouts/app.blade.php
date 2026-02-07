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

                    @auth
                        <a href="{{ route('events.create') }}" class="bg-white text-purple-600 px-4 py-2 rounded-full hover:bg-pink-100 transition font-semibold flex items-center">
                            <i class="fas fa-plus mr-1"></i> Ajouter
                        </a>
                    @endauth

                    <a href="{{ route('about') }}" class="text-white hover:text-pink-200 transition flex items-center">
                        <i class="fas fa-info-circle mr-1"></i> À propos
                    </a>

                    @auth
                        <!-- Profil utilisateur Desktop -->
                        <div class="relative">
                            <button id="profileToggle" class="text-white flex items-center space-x-2 hover:text-pink-200 transition">
                                <div class="w-8 h-8 bg-white bg-opacity-30 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-sm"></i>
                                </div>
                                <span class="text-sm hidden lg:inline">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>

                            <!-- Dropdown Desktop -->
                            <div id="profileMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-100 z-10">
                                <div class="px-4 py-3 border-b border-gray-100">
                                    <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-400">{{ Auth::user()->email }}</p>
                                </div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition flex items-center">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Se déconnecter
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <!-- Boutons Connexion / Inscription Desktop -->
                        <a href="{{ route('login') }}" class="text-white hover:text-pink-200 transition text-sm flex items-center">
                            <i class="fas fa-sign-in-alt mr-1"></i> Connexion
                        </a>
                        <a href="{{ route('register') }}" class="bg-white text-purple-600 px-4 py-2 rounded-full hover:bg-pink-100 transition font-semibold text-sm flex items-center">
                            <i class="fas fa-user-plus mr-1"></i> Inscription
                        </a>
                    @endauth
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

            @auth
                <a href="{{ route('events.create') }}" class="block text-white py-2 hover:text-pink-200 transition border-b border-white border-opacity-20">
                    <i class="fas fa-plus mr-2"></i> Ajouter un événement
                </a>
            @endauth

            <a href="{{ route('about') }}" class="block text-white py-2 hover:text-pink-200 transition border-b border-white border-opacity-20">
                <i class="fas fa-info-circle mr-2"></i> À propos
            </a>

            @auth
                <div class="border-t border-white border-opacity-20 mt-2 pt-2">
                    <p class="text-purple-200 text-xs px-1 mb-1">Connecté comme</p>
                    <p class="text-white text-sm font-semibold px-1 mb-2">{{ Auth::user()->name }}</p>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block w-full text-left text-red-300 py-2 hover:text-red-100 transition">
                            <i class="fas fa-sign-out-alt mr-2"></i> Se déconnecter
                        </button>
                    </form>
                </div>
            @else
                <div class="border-t border-white border-opacity-20 mt-2 pt-2 flex space-x-3">
                    <a href="{{ route('login') }}" class="flex-1 text-center text-white border border-white border-opacity-50 py-2 rounded-lg text-sm hover:bg-white hover:bg-opacity-10 transition">
                        Connexion
                    </a>
                    <a href="{{ route('register') }}" class="flex-1 text-center bg-white text-purple-600 py-2 rounded-lg text-sm font-semibold hover:bg-pink-100 transition">
                        Inscription
                    </a>
                </div>
            @endauth
        </div>
    </nav>

    <!-- Messages flash -->
    @if(session('success'))
        <div class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative flex items-center justify-between">
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

    @if(session('error'))
        <div class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative flex items-center justify-between">
                <span class="flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    {{ session('error') }}
                </span>
                <button onclick="this.parentElement.parentElement.style.display='none'" class="text-red-700 hover:text-red-900">
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

    <!-- Scripts -->
    <script>
        // Menu Mobile
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        const menuIcon = document.getElementById('menuIcon');

        menuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            menuIcon.classList.toggle('fa-bars');
            menuIcon.classList.toggle('fa-times');
        });

        // Dropdown Profil Desktop
        const profileToggle = document.getElementById('profileToggle');
        const profileMenu = document.getElementById('profileMenu');

        if (profileToggle && profileMenu) {
            profileToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                profileMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function() {
                profileMenu.classList.add('hidden');
            });
        }
    </script>
</body>
</html>