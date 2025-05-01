@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto mt-16 px-8">
    <div class="bg-gradient-to-br from-gray-100 via-white to-gray-50 border border-gray-200 rounded-3xl shadow-xl p-12 backdrop-blur-lg hover:shadow-3xl transition-all duration-500">
        
        <!-- Titre stylisé -->
        <div class="text-center">
            <h2 class="text-6xl font-extrabold text-gray-800 tracking-tight hover:text-indigo-600 transition duration-300">
                👋 Bienvenue, <span class="text-indigo-500">{{ $user->name }}</span>
            </h2>
            <span class="mt-4 h-1 w-36 bg-indigo-500 rounded-full mx-auto"></span>
        </div>

        <!-- Cartes de gestion avec effets fluides -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mt-12">
            
            <!-- Voir les vidéos -->
            <a href="{{route('videos.index')}}"
               class="group block bg-white bg-opacity-80 backdrop-blur-lg border border-gray-200 rounded-3xl p-10 shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 hover:border-indigo-500">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-6">
                        <div class="bg-indigo-100 text-indigo-600 rounded-full p-5 group-hover:bg-indigo-200 transition">
                            🎥
                        </div>
                        <div>
                            <h3 class="text-3xl font-semibold text-gray-900 group-hover:text-indigo-600">
                                Voir les vidéos
                            </h3>
                            <p class="text-lg text-gray-600 group-hover:text-gray-700">
                                Consultez toutes les vidéos disponibles
                            </p>
                        </div>
                    </div>
                    <svg class="h-8 w-8 text-indigo-500 group-hover:text-indigo-700 transition-transform duration-300 group-hover:rotate-12"
                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </a>

            <!-- Mes matières -->
            <a href="{{ route('etudiants.matieres') }}"
               class="group block bg-white bg-opacity-80 backdrop-blur-lg border border-gray-200 rounded-3xl p-10 shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 hover:border-green-500">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-6">
                        <div class="bg-green-100 text-green-600 rounded-full p-5 group-hover:bg-green-200 transition">
                            📘
                        </div>
                        <div>
                            <h3 class="text-3xl font-semibold text-gray-900 group-hover:text-green-600">
                                Mes matières
                            </h3>
                            <p class="text-lg text-gray-600 group-hover:text-gray-700">
                                Accédez aux cours associés
                            </p>
                        </div>
                    </div>
                    <svg class="h-8 w-8 text-green-500 group-hover:text-green-700 transition-transform duration-300 group-hover:rotate-12"
                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
