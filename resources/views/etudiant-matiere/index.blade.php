@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <a href="{{ route('etudiant-matiere.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-green-600 transition">
        Ajouter une relation
    </a>

    <table class="mt-6 w-full border-collapse">
        <thead>
            <tr>
                <th class="border px-4 py-2">Étudiant</th>
                <th class="border px-4 py-2">Matière</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($relations as $relation)
                <tr class="border hover:bg-gray-100">
                    <td class="border px-4 py-2">{{ $relation->etudiant->name }}</td>
                    <td class="border px-4 py-2">{{ $relation->matiere->name }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('etudiant-matiere.edit', $relation->id) }}" class="text-yellow-500 hover:text-yellow-700">Modifier</a>
                        <form action="{{ route('etudiant-matiere.destroy', $relation->id) }}" method="POST" class="inline-block">
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
