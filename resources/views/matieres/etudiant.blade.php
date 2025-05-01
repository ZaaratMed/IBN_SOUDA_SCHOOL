@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Mes matières</h2>

    @if ($matieres->isEmpty())
        <p class="text-gray-600">Vous n'êtes inscrit à aucune matière pour le moment.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($matieres as $matiere)
                <div class="bg-gray-100 p-6 rounded-lg shadow hover:shadow-md transition-shadow duration-300">
                    <h3 class="text-xl font-bold text-gray-900">{{ $matiere->name }}</h3>
                    <p class="text-gray-700">{{ $matiere->description }}</p>
                </div>
            @endforeach
        </div>
    @endif
</div>

@endsection
