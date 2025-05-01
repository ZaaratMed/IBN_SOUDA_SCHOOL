@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    @foreach ($pages as $page)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-6 transition-transform transform hover:scale-105 hover:shadow-2xl">
            @if ($page->image_url)
                <img src="{{ asset('storage/' . $page->image_url) }}" class="w-full h-64 object-cover" alt="{{ $page->titre }}">
            @endif
            <div class="p-6">
                <h5 class="text-2xl font-semibold text-gray-800">{{ $page->titre }}</h5>
                <p class="text-gray-600 mt-4">{{ $page->contenu }}</p>
                <div class="mt-6 flex space-x-4">
                    <a href="{{ route('Pages.edit', $page->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-yellow-600 transition duration-300">
                        Modifier
                    </a>
                    <form action="{{ route('Pages.destroy', $page->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-600 transition duration-300">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
