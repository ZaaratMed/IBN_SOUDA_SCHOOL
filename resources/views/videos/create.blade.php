@extends('layouts.app')

@section('content')

<div class="container mx-auto p-4">
    <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6" style="background-color: #f9fafb !important;">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titre :</label>
            <input type="text" name="titre" id="title" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description :</label>
            <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500"></textarea>
        </div>
        <div class="mb-4">
            <label for="video" class="block text-gray-700 text-sm font-bold mb-2">Vidéo :</label>
            <input type="file" name="url" id="video" accept="video/*" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="niveau" class="block text-gray-700 text-sm font-bold mb-2">Niveau :</label>
            <input type="text" name="niveau" id="niveau" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" style="background-color: #10b981 !important;">
                Ajouter la vidéo
            </button>
        </div>
    </form>
</div>

@endsection
