@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-6 bg-gradient-to-r from-gray-50 via-white to-gray-100 shadow rounded-lg">
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800">Liste des Enseignants</h1>
        <a href="{{ route('enseignants.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 shadow-md transition duration-300">
            Ajouter un Enseignant
        </a>
    </div>

    <table class="w-full bg-white rounded-lg shadow overflow-hidden">
        <thead>
            <tr class="bg-blue-100 text-gray-800 text-left font-semibold">
                <th class="px-6 py-4">Nom</th>
                <th class="px-6 py-4">Matière</th>
                <th class="px-6 py-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enseignants as $enseignant)
                <tr class="border-t hover:bg-gray-50 transition duration-200">
                    <td class="px-6 py-4">
                        {{-- {{dd($enseignant->user)}} --}}
                        {{ $enseignant->user ? $enseignant->user->name : 'Utilisateur non trouvé' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $enseignant->matiere ? $enseignant->matiere->name : 'Matière non définie' }}
                    </td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('enseignants.edit', $enseignant->id) }}" class="text-yellow-500 hover:text-yellow-700">Modifier</a>
                        <form action="{{ route('enseignants.destroy', $enseignant->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        
    </table>
</div>

@endsection