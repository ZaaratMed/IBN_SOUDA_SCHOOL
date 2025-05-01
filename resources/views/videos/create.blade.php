@extends('layouts.app')

@section('content')

<div class="container mx-auto p-4">
    <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-lg rounded-lg p-6 border border-gray-200">
        @csrf
        <div class="mb-6">
            <label for="title" class="block text-gray-800 text-lg font-medium mb-2">Titre :</label>
            <input type="text" name="titre" id="title" required class="w-full px-4 py-3 rounded-lg shadow-sm border border-gray-300 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-300 text-gray-700">
        </div>
        <div class="mb-6">
            <label for="description" class="block text-gray-800 text-lg font-medium mb-2">Description :</label>
            <textarea name="description" id="description" class="w-full px-4 py-3 rounded-lg shadow-sm border border-gray-300 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-300 text-gray-700"></textarea>
        </div>
        <div class="mb-6">
            <label for="video" class="block text-gray-800 text-lg font-medium mb-2">Vidéo :</label>
            <input type="file" name="url" id="video" accept="video/*" required class="w-full px-4 py-3 rounded-lg shadow-sm border border-gray-300 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-300 text-gray-700">
        </div>
        <div class="mb-6">
            <label for="niveau" class="block text-gray-800 text-lg font-medium mb-2">Niveau :</label>
            <input type="text" name="niveau" id="niveau" required class="w-full px-4 py-3 rounded-lg shadow-sm border border-gray-300 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-300 text-gray-700">
        </div>
        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                Ajouter la vidéo
            </button>
        </div>
    </form>
</div>


@endsection
