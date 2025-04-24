@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Liste des Matières</h2>
        <a href="{{ route('matieres.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Ajouter une Matière
        </a>
    </div>

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left text-sm uppercase text-gray-700">
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Nom</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matieres as $matiere)
            <tr class="border-t">
                <td class="py-2 px-4">{{ $matiere->id }}</td>
                <td class="py-2 px-4">{{ $matiere->name }}</td>
                <td class="py-2 px-4">
                    <a href="{{ route('matieres.edit', $matiere) }}" class="text-blue-600 hover:underline mr-2">Modifier</a>
                    <form action="{{ route('matieres.destroy', $matiere) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline" onclick="return confirm('Supprimer cette matière ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
