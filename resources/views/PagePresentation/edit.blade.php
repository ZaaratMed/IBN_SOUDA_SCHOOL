@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Modifier la Page de Présentation</h2>

    <form action="{{ route('Pages.update', $page->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="titre" class="block text-lg font-medium text-gray-700 mb-2">Titre</label>
            <input type="text" name="titre" id="titre" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ $page->titre }}" required>
        </div>

        <div class="mb-6">
            <label for="contenu" class="block text-lg font-medium text-gray-700 mb-2">Description</label>
            <textarea name="contenu" id="description" rows="5" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" >{{ $page->contenu }}</textarea>
        </div>

        <div class="mb-6">
            <label for="image" class="block text-lg font-medium text-gray-700 mb-2">Image actuelle</label>
            @if($page->image_url)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $page->image_url) }}" alt="Image actuelle" class="rounded-lg shadow-md max-w-xs">
                </div>
            @endif
            <label for="image" class="block text-lg font-medium text-gray-700 mb-2">Changer l'image (optionnel)</label>
            <input type="file" name="image_url" id="image" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-green-500 text-white font-medium px-6 py-2 rounded-lg shadow-md hover:bg-green-600 transition duration-300">Mettre à jour</button>
            <a href="{{ route('Pages.index') }}" class="bg-gray-500 text-white font-medium px-6 py-2 rounded-lg shadow-md hover:bg-gray-600 transition duration-300">Annuler</a>
        </div>
    </form>
</div>
@endsection
