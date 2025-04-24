@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-6">
    <h2 class="text-3xl font-bold text-gray-900 mb-8">Bonjour M. {{ $user->name }}</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Mes vidéos -->
        <a href="{{route('videos')}}" class="group block p-6 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md hover:border-gray-300 transition">
            <div class="flex items-center space-x-4">
                <div class="flex items-center justify-center w-12 h-12 bg-blue-100 text-blue-600 rounded-full group-hover:bg-blue-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14m-6 0v1a3 3 0 003 3h4m-7-4H6a2 2 0 01-2-2V8a2 2 0 012-2h1" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Mes vidéos</h3>
                    <p class="text-sm text-gray-500">Consultez et gérez vos vidéos publiées</p>
                </div>
            </div>
        </a>

        <!-- Ajouter une vidéo -->
        <a href="{{route('videos.create')}}" class="group block p-6 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md hover:border-gray-300 transition">
            <div class="flex items-center space-x-4">
                <div class="flex items-center justify-center w-12 h-12 bg-green-100 text-green-600 rounded-full group-hover:bg-green-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Ajouter une vidéo</h3>
                    <p class="text-sm text-gray-500">Publiez une nouvelle ressource pédagogique</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
