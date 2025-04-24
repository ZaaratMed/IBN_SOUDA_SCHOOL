@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg border border-gray-200">
    <form action="{{ route('matieres.store') }}" method="post">
        @csrf
        <!-- Nom de la matière -->
        <div class="mb-4">
            <label for="name" class="block font-semibold text-gray-700">Nom de la matière</label>
            <input type="text" name="name" id="name" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" required>
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block font-semibold text-gray-700">Description</label>
            <textarea name="description" id="description" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" rows="4"></textarea>
        </div>

        <!-- Boutons -->
        <div class="flex justify-between">
            <a href="{{ route('matieres.index') }}"
               class="inline-block bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
                Annuler
            </a>
            <button type="submit" class="bg-blue-500 text-white hover:bg-blue-600 px-6 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection
