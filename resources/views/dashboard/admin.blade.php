@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-6">
    <h2 class="text-4xl font-bold text-gray-900 mb-10">Bienvenue Admin, {{ $user->name }}</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Gérer les utilisateurs -->
        <a href="#" class="group block p-6 bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-lg hover:border-gray-300 transition-all">
            <div class="flex items-center space-x-4">
                <div class="flex items-center justify-center w-12 h-12 bg-indigo-100 text-indigo-600 rounded-xl group-hover:bg-indigo-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 12l5-5m0 0l5 5m-5-5v12" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Gérer les utilisateurs</h3>
                    <p class="text-sm text-gray-500">Ajouter, modifier ou désactiver un compte</p>
                </div>
            </div>
        </a>

        <!-- Gérer les matières -->
        <a href="{{route('matieres.index')}}" class="group block p-6 bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-lg hover:border-gray-300 transition-all">
            <div class="flex items-center space-x-4">
                <div class="flex items-center justify-center w-12 h-12 bg-yellow-100 text-yellow-600 rounded-xl group-hover:bg-yellow-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M10 9l5 5-5 5m5-5H3" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Gérer les matières</h3>
                    <p class="text-sm text-gray-500">Organiser les cours et le contenu</p>
                </div>
            </div>
        </a>

        <!-- Toutes les vidéos -->
        <a href="{{route('videos')}}" class="group block p-6 bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-lg hover:border-gray-300 transition-all">
            <div class="flex items-center space-x-4">
                <div class="flex items-center justify-center w-12 h-12 bg-green-100 text-green-600 rounded-xl group-hover:bg-green-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 12l-5 5m0 0l-5-5m5 5V6" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Toutes les vidéos</h3>
                    <p class="text-sm text-gray-500">Consulter l’ensemble des vidéos publiées</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
