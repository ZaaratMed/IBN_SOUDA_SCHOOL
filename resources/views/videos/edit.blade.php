@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-gradient-to-r from-gray-50 via-white to-gray-100 p-8 rounded-lg shadow-xl">
    <form action="{{ route('videos.update', $video->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label class="block text-lg font-semibold text-gray-900 mb-2">Titre</label>
            <input type="text" name="titre" value="{{ old('titre', $video->titre) }}" class="w-full px-4 py-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700">
            @error('titre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <label class="block text-lg font-semibold text-gray-900 mb-2">Description</label>
            <textarea name="description" class="w-full px-4 py-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700">{{ old('description', $video->description) }}</textarea>
        </div>

        <div class="mb-6">
            <label class="block text-lg font-semibold text-gray-900 mb-2">Niveau</label>
            <input type="text" name="niveau" value="{{ old('niveau', $video->niveau) }}" class="w-full px-4 py-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700">
        </div>

        <div class="mb-6">
            <label class="block text-lg font-semibold text-gray-900 mb-2">Changer la vidéo (optionnel)</label>
            <input type="file" name="url" accept="video/*" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-700 text-white font-bold rounded-lg shadow-md hover:shadow-lg transition-transform transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Mettre à jour
            </button>
        </div>
    </form>
</div>

@endsection
