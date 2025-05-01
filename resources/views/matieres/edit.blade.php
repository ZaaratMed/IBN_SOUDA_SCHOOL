@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-12 bg-gradient-to-br from-white to-gray-50 p-8 rounded-3xl shadow-2xl">
    <!-- Titre principal -->
    <h1 class="text-3xl font-extrabold text-gray-800 mb-8 text-center tracking-wide">
        Modifier la Matière
    </h1>

    <!-- Message d'erreur ou de succès -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 border border-green-300 rounded-lg p-4 mb-6 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 border border-red-300 rounded-lg p-4 mb-6 shadow-sm">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulaire de modification -->
    <form action="{{ route('matieres.update', $matiere->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Champ Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nom de la Matière</label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $matiere->name) }}"
                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            >
        </div>

        <!-- Champ Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea
                name="description"
                id="description"
                rows="4"
                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                required
            >{{ old('description', $matiere->description) }}</textarea>
        </div>

        <!-- Bouton de soumission -->
        <div class="flex justify-end">
            <button
                type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
                Enregistrer les modifications
            </button>
        </div>
    </form>
</div>
@endsection
