@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-12 bg-gradient-to-br from-white to-gray-100 p-8 rounded-3xl shadow-2xl">
    <!-- Titre principal -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-extrabold text-gray-800 tracking-tight">Liste des Matières</h2>
        <a href="{{ route('matieres.create') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium px-5 py-2 rounded-full shadow-md transition">
            + Ajouter une Matière
        </a>
    </div>

    <!-- Table -->
    <div class="overflow-hidden rounded-lg shadow-lg">
        <table class="w-full table-auto border-collapse bg-white">
            <thead>
                <tr class="bg-gray-200 text-left text-sm font-semibold uppercase text-gray-700">
                    <th class="py-3 px-6">ID</th>
                    <th class="py-3 px-6">Nom</th>
                    <th class="py-3 px-6">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($matieres as $matiere)
                <tr class="hover:bg-gray-100 transition">
                    <td class="py-4 px-6 text-gray-700 font-medium">{{ $matiere->id }}</td>
                    <td class="py-4 px-6 text-gray-700">{{ $matiere->name }}</td>
                    <td class="py-4 px-6 flex items-center space-x-4">
                        <a href="{{ route('matieres.edit', $matiere) }}" class="text-indigo-500 hover:text-indigo-700 font-medium transition">
                            Modifier
                        </a>
                        <form action="{{ route('matieres.destroy', $matiere) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 font-medium transition" onclick="return confirm('Supprimer cette matière ?')">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
