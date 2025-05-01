@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-16 bg-gradient-to-br from-white to-gray-50 p-8 rounded-2xl shadow-2xl border border-gray-300">
    <form action="{{ route('matieres.store') }}" method="post">
        @csrf
        <!-- Nom de la matière -->
        <div class="mb-6">
            <label for="name" class="block text-lg font-semibold text-gray-800">Nom de la matière</label>
            <input type="text" name="name" id="name" class="mt-2 w-full px-5 py-3 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Entrez le nom de la matière" required>
            @error('name')
                <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-6">
            <label for="description" class="block text-lg font-semibold text-gray-800">Description</label>
            <textarea name="description" id="description" class="mt-2 w-full px-5 py-3 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" rows="4" placeholder="Ajoutez une description"></textarea>
        </div>

        <!-- Boutons -->
        <div class="flex justify-between items-center">
            <a href="{{ route('matieres.index') }}"
               class="inline-block bg-gray-400 text-gray-700 px-5 py-3 rounded-lg hover:bg-gray-500 hover:text-gray-800 transition">
                Annuler
            </a>
            <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition">
                Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection
