@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Ajouter un Enseignant</h2>
    <form action="{{ route('enseignants.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="user_id" class="block text-lg font-medium text-gray-700">Utilisateur</label>
            <select name="user_id" id="user_id" class="w-full px-4 py-2 border rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-400">
                <!-- Exemple : chargez vos utilisateurs depuis le contrôleur -->
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="matiere_id" class="block text-lg font-medium text-gray-700">Matière</label>
            <select name="matiere_id" id="matiere_id" class="w-full px-4 py-2 border rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-400">
                @foreach ($matieres as $matiere)
                    <option value="{{ $matiere->id }}">{{ $matiere->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded shadow hover:bg-green-600 transition">
            Ajouter
        </button>
    </form>
</div>

@endsection