@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <form action="{{ route('videos.update', $video->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold text-gray-800">Titre</label>
            <input type="text" name="titre" value="{{ old('titre', $video->titre) }}" class="w-full border rounded px-3 py-2 text-black">
            @error('titre') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold text-gray-800">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2 text-black">{{ old('description', $video->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold text-gray-800">Niveau</label>
            <input type="text" name="niveau" value="{{ old('niveau', $video->niveau) }}" class="w-full border rounded px-3 py-2 text-black">
        </div>

        <div class="mb-4">
            <label class="block font-semibold text-gray-800">Changer la vidéo (optionnel)</label>
            <input type="file" name="url" accept="video/*" class="block mt-1">
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Mettre à jour
        </button>
    </form>
</div>
@endsection
