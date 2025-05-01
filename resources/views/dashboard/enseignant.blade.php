@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-16 px-8 bg-gradient-to-br from-gray-50 via-white to-gray-200 rounded-2xl shadow-xl border border-gray-300 transition-all duration-500 hover:shadow-3xl hover:scale-105">
    
    <!-- En-tête stylisée -->
    <div class="text-center">
        <h2 class="text-5xl font-extrabold text-gray-800 tracking-tight hover:text-indigo-600 transition duration-300">
            Bonjour, <span class="text-indigo-600">{{ $user->name }}</span>
        </h2>
        <span class="mt-4 h-1 w-32 bg-indigo-500 rounded-full mx-auto"></span>
    </div>

    <!-- Cartes de gestion avec animations -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-12">
        
        <!-- Mes vidéos -->
        <a href="{{route('videos.index')}}" class="group block p-8 bg-white bg-opacity-80 backdrop-blur-lg rounded-2xl shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300">
            <div class="flex items-center space-x-6">
                <div class="flex items-center justify-center w-16 h-16 bg-blue-100 text-blue-600 rounded-full group-hover:bg-blue-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 transition-transform duration-300 group-hover:rotate-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14m-6 0v1a3 3 0 003 3h4m-7-4H6a2 2 0 01-2-2V8a2 2 0 012-2h1" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900 group-hover:text-blue-600">
                        Mes vidéos
                    </h3>
                    <p class="text-md text-gray-600 group-hover:text-gray-700">
                        Consultez et gérez vos vidéos publiées
                    </p>
                </div>
            </div>
        </a>

        <!-- Ajouter une vidéo -->
        <a href="{{route('videos.create')}}" class="group block p-8 bg-white bg-opacity-80 backdrop-blur-lg rounded-2xl shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300">
            <div class="flex items-center space-x-6">
                <div class="flex items-center justify-center w-16 h-16 bg-green-100 text-green-600 rounded-full group-hover:bg-green-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 transition-transform duration-300 group-hover:rotate-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900 group-hover:text-green-600">
                        Ajouter une vidéo
                    </h3>
                    <p class="text-md text-gray-600 group-hover:text-gray-700">
                        Publiez une nouvelle ressource pédagogique
                    </p>
                </div>
            </div>
        </a>

    </div>
</div>
@endsection
