@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-12 py-16 px-10 bg-white rounded-xl shadow-xl border border-gray-300 transition-all duration-500 hover:shadow-2xl hover:scale-105">

    @if ($page)
        <div class="flex flex-col items-center text-center mb-12">
            <!-- Titre stylisé -->
            <h1 class="text-5xl font-bold text-gray-900 tracking-tight">
                {{ $page->titre }}
            </h1>
            <span class="mt-2 h-1 w-32 bg-indigo-500 rounded-full"></span>

            <!-- Image avec effet subtil -->
            @if($page->image_url)
                <div class="mt-8 w-full max-w-2xl">
                    <img src="{{ asset('storage/' . $page->image_url) }}" 
                         alt="Présentation" 
                         class="rounded-lg shadow-md transition-transform duration-500 hover:scale-105 w-full">
                </div>
            @endif
        </div>

        <!-- Contenu avec une mise en page raffinée -->
        <div class="prose prose-lg text-gray-700 leading-relaxed">
            {!! nl2br(e($page->contenu)) !!}
        </div>
    @else
        <p class="text-center text-lg text-gray-500 italic animate-pulse">
            Aucune présentation disponible pour le moment.
        </p>
    @endif
</div>
@endsection
