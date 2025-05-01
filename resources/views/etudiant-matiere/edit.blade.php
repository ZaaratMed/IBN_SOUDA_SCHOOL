@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Modifier la Relation Étudiant-Matière</h2>

    <form action="{{ route('etudiant-matiere.update', $relation->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <!-- Étudiant -->
        <div class="mb-6">
            <label for="etudiant_id" class="block text-lg font-medium text-gray-700 mb-2">Étudiant</label>
            <select name="etudiant_id" id="etudiant_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                @foreach ($etudiants as $etudiant)
                    <option value="{{ $etudiant->id }}" {{ $etudiant->id == $relation->etudiant_id ? 'selected' : '' }}>
                        {{ $etudiant->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Matière -->
        <div class="mb-6">
            <label for="matiere_id" class="block text-lg font-medium text-gray-700 mb-2">Matière</label>
            <select name="matiere_id" id="matiere_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                @foreach ($matieres as $matiere)
                    <option value="{{ $matiere->id }}" {{ $matiere->id == $relation->matiere_id ? 'selected' : '' }}>
                        {{ $matiere->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Boutons -->
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-green-500 text-white font-medium px-6 py-2 rounded-lg shadow-md hover:bg-green-600 transition duration-300">
                Mettre à jour
            </button>
            <a href="{{ route('etudiant-matiere.index') }}" class="bg-gray-500 text-white font-medium px-6 py-2 rounded-lg shadow-md hover:bg-gray-600 transition duration-300">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection
