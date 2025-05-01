@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-gradient-to-r from-gray-100 via-white to-gray-50 shadow-xl rounded-lg p-8">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Modifier Enseignant</h2>
    <form action="{{ route('enseignants.update', $enseignant->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="user_id" class="block text-lg font-medium text-gray-700">Utilisateur</label>
            <input type="text" name="user_id" id="user_id" value="{{ $enseignant->user ? $enseignant->user->name : 'Utilisateur introuvable' }}" class="w-full px-4 py-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-700" readonly>
        </div>

        <div class="mb-6">
            <label for="matiere_id" class="block text-lg font-medium text-gray-700">Matière</label>
            <select name="matiere_id" id="matiere_id" class="w-full px-4 py-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-700">
                @foreach ($matieres as $matiere)
                    <option value="{{ $matiere->id }}" {{ $matiere->id == $enseignant->matiere_id ? 'selected' : '' }}>{{ $matiere->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="w-full px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition-transform transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-400">
            Mettre à jour
        </button>
    </form>
</div>
@endsection
