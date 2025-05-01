@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Gestion des Utilisateurs</h1>
        <a href="{{ route('users.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700">
            + Ajouter un utilisateur
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Cartes statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <!-- Total Utilisateurs -->
        <div class="p-6 bg-white rounded-xl shadow-md border border-gray-300 hover:shadow-lg hover:scale-105 transition-all text-center">
            <h3 class="text-3xl font-bold text-gray-800">👥 {{ $totalUsers }}</h3>
            <p class="text-lg text-gray-600">Total des utilisateurs</p>
        </div>

        <!-- Total Étudiants -->
        <div class="p-6 bg-blue-100 rounded-xl shadow-md border border-blue-300 hover:shadow-lg hover:scale-105 transition-all text-center">
            <h3 class="text-3xl font-bold text-blue-800">🎓 {{ $totalStudents }}</h3>
            <p class="text-lg text-blue-700">Total des étudiants</p>
        </div>

        <!-- Total Enseignants -->
        <div class="p-6 bg-green-100 rounded-xl shadow-md border border-green-300 hover:shadow-lg hover:scale-105 transition-all text-center">
            <h3 class="text-3xl font-bold text-green-800">📚 {{ $totalTeachers }}</h3>
            <p class="text-lg text-green-700">Total des enseignants</p>
        </div>
    </div>

    <!-- Tableau des utilisateurs -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="table-auto w-full">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">#</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Nom</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Email</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Rôle</th>
                    <th class="px-4 py-2 text-right text-sm font-medium text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm">{{ $user->id }}</td>
                        <td class="px-4 py-2 text-sm">{{ $user->name }}</td>
                        <td class="px-4 py-2 text-sm">{{ $user->email }}</td>
                        <td class="px-4 py-2 text-sm">{{ $user->role->nom }}</td>
                        <td class="px-4 py-2 text-right space-x-2">
                            <a href="{{ route('users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-800 font-medium">Modifier</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
