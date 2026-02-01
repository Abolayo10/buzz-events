@extends('layouts.app')

@section('title', 'À propos')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-6 text-center">
            <i class="fas fa-user-circle text-purple-600"></i> À propos
        </h1>

        <div class="flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">
            <div class="flex-shrink-0">
                <div class="w-48 h-48 bg-gradient-to-br from-purple-600 to-pink-600 rounded-full flex items-center justify-center">
                    <i class="fas fa-code text-white text-6xl"></i>
                </div>
            </div>
            <div class="flex-1">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Développeur Full Stack</h2>
                <p class="text-gray-700 mb-4 leading-relaxed">
                    Passionné par le développement web et les nouvelles technologies, j'ai créé <strong>Buzz Events</strong>
                    pour permettre à chacun de partager et découvrir les événements qui font le buzz sur internet.
                </p>
                <p class="text-gray-700 mb-4 leading-relaxed">
                    Cette application a été développée avec <strong>Laravel</strong>, un framework PHP moderne et puissant,
                    en utilisant les meilleures pratiques de développement web.
                </p>

                <div class="bg-purple-50 border-l-4 border-purple-600 p-4 mb-6">
                    <h3 class="font-bold text-purple-800 mb-2">Technologies utilisées</h3>
                    <ul class="space-y-1 text-gray-700">
                        <li><i class="fab fa-laravel text-red-600 mr-2"></i>Laravel (Backend)</li>
                        <li><i class="fab fa-html5 text-orange-600 mr-2"></i>HTML5 / CSS3</li>
                        <li><i class="fas fa-wind text-blue-400 mr-2"></i>Tailwind CSS</li>
                        <li><i class="fas fa-database text-blue-600 mr-2"></i>MySQL</li>
                        <li><i class="fab fa-docker text-blue-500 mr-2"></i>Docker</li>
                    </ul>
                </div>

                <div class="flex space-x-4">
                    <a href="#" class="text-purple-600 hover:text-purple-800 text-2xl"><i class="fab fa-github"></i></a>
                    <a href="#" class="text-blue-600 hover:text-blue-800 text-2xl"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="text-pink-600 hover:text-pink-800 text-2xl"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
        </div>

        <div class="mt-8 pt-8 border-t">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Objectif du projet</h3>
            <p class="text-gray-700 leading-relaxed">
                Buzz Events vise à créer une plateforme collaborative où les internautes peuvent partager
                et découvrir rapidement les tendances et actualités qui font vibrer le web. Chaque événement
                est soigneusement présenté avec une image, une description concise et un lien direct vers la source
                pour approfondir le sujet.
            </p>
        </div>
    </div>
</div>
@endsection