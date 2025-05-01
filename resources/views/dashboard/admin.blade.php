@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-8 bg-gradient-to-br from-gray-100 to-white rounded-xl shadow-2xl border border-gray-300 transition-all duration-500 hover:shadow-3xl hover:scale-105">

    <!-- Titre avec effet dynamique -->
    <div class="text-center mb-12">
        <h2 class="text-6xl font-extrabold text-gray-900 tracking-wide relative">
            Bienvenue Admin, <span class="text-indigo-600">{{ $user->name }}</span>
        </h2>
        <span class="mt-3 h-1 w-36 bg-indigo-500 rounded-full mx-auto"></span>
    </div>

    <!-- Cartes de gestion -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        @foreach([
            ['route' => 'users.index', 'color' => 'indigo', 'title' => 'Gérer les utilisateurs', 'desc' => 'Ajouter, modifier ou désactiver un compte'],
            ['route' => 'matieres.index', 'color' => 'yellow', 'title' => 'Gérer les matières', 'desc' => 'Organiser les cours et le contenu'],
            ['route' => 'videos.index', 'color' => 'green', 'title' => 'Toutes les vidéos', 'desc' => 'Consulter les vidéos publiées'],
            ['route' => 'enseignants.index', 'color' => 'red', 'title' => 'Gérer les enseignants', 'desc' => 'Ajouter, modifier ou supprimer des enseignants'],
            ['route' => 'Pages.index', 'color' => 'blue', 'title' => 'Gérer la présentation', 'desc' => 'Modifier le contenu de l’accueil'],
            ['route' => 'etudiant-matiere.index', 'color' => 'purple', 'title' => 'Gérer Étudiant-Matière', 'desc' => 'Organiser les relations étudiant-matière'],
        ] as $card)
            <a href="{{ route($card['route']) }}" class="group block p-6 bg-white bg-opacity-80 backdrop-blur-lg rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center justify-center w-16 h-16 bg-{{ $card['color'] }}-100 text-{{ $card['color'] }}-600 rounded-full group-hover:bg-{{ $card['color'] }}-200 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 group-hover:rotate-12 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 group-hover:text-{{ $card['color'] }}-600">{{ $card['title'] }}</h3>
                        <p class="text-sm text-gray-500">{{ $card['desc'] }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
