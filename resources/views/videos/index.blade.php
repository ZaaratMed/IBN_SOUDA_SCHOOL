@extends('layouts.app')

@section('content')

<div class="container mx-auto p-4">
    <a href="{{ route('videos.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 flex items-center mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" />
        </svg>
        Ajouter une vidéo
    </a>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($videos as $video)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-4">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 2v10H4V5h12zM8 7a1 1 0 100 2h4a1 1 0 100-2H8z" />
                        </svg>
                        <h3 class="text-xl font-semibold ml-4">{{ $video->titre }}</h3>
                    </div>
                    <p class="text-gray-700 mt-2">{{ $video->description }}</p>
                    <video width="100%" height="auto" controls class="rounded mt-2">
                        <source src="{{ asset('storage/' . $video->url) }}" type="video/mp4">
                        Votre navigateur ne supporte pas la vidéo.
                    </video>
                    <h3 class="text-gray-600 mt-2">{{ $video->niveau }}</h3>
                    <div class="flex mt-4 space-x-4">
                        <a href="{{ route('videos.edit', $video->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L8 9.172V11h1.828l6.586-6.586a2 2 0 000-2.828zM7 12v2H5v-2H3v-2h2V8h2v2h2v2H7z" />
                            </svg>
                            Modifier
                        </a>
                        <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v1H3a1 1 0 000 2h1v9a2 2 0 002 2h8a2 2 0 002-2V7h1a1 1 0 100-2h-1V4a2 2 0 00-2-2H6zm2 3a1 1 0 011-1h4a1 1 0 011 1v1H8V5zm-2 3h8v9H6V8z" clip-rule="evenodd" />
                                </svg>
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
