@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <form action="{{ route('etudiant-matiere.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="etudiant_id" class="block text-lg font-medium text-gray-700">Étudiant</label>
            <select name="etudiant_id" id="etudiant_id" class="w-full px-4 py-2 border rounded-lg">
                @foreach ($etudiants as $etudiant)
                    <option value="{{ $etudiant->id }}">{{ $etudiant->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="matiere_id" class="block text-lg font-medium text-gray-700">Matière</label>
            <select name="matiere_id" id="matiere_id" class="w-full px-4 py-2 border rounded-lg">
                @foreach ($matieres as $matiere)
                    <option value="{{ $matiere->id }}">{{ $matiere->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition">
            Ajouter
        </button>
    </form>
</div>
@endsection
