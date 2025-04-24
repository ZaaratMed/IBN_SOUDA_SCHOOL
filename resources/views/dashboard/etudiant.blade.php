@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto mt-16 px-6">
    <div class="bg-gradient-to-r from-white to-gray-50 border border-gray-200 rounded-3xl shadow-lg p-10">
        <h2 class="text-4xl font-extrabold text-gray-900 mb-10 tracking-tight">
            👋 Bienvenue, <span class="text-indigo-600">{{ $user->name }}</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Carte : Voir les vidéos -->
            <a href="#"
               class="group bg-white border border-gray-100 rounded-2xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:border-indigo-300">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="bg-indigo-100 text-indigo-600 rounded-xl p-3 group-hover:bg-indigo-200 transition">
                            🎥
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Voir les vidéos</h3>
                            <p class="text-sm text-gray-500">Consultez toutes les vidéos disponibles</p>
                        </div>
                    </div>
                    <svg class="h-5 w-5 text-indigo-400 group-hover:text-indigo-600" fill="none"
                         stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </a>

            <!-- Carte : Mes matières -->
            <a href="#"
               class="group bg-white border border-gray-100 rounded-2xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:border-green-300">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="bg-green-100 text-green-600 rounded-xl p-3 group-hover:bg-green-200 transition">
                            📘
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Mes matières</h3>
                            <p class="text-sm text-gray-500">Accédez aux cours associés</p>
                        </div>
                    </div>
                    <svg class="h-5 w-5 text-green-400 group-hover:text-green-600" fill="none"
                         stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
