@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Modifier l'utilisateur</h1>

    <!-- Affichage des erreurs -->
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="bg-white shadow rounded-lg p-6">
        @csrf
        @method('PUT')

        <!-- Champ Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
            <input
                type="text"
                name="name"
                id="name"
                class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                value="{{ old('name', $user->name) }}"
                required
            >
        </div>

        <!-- Champ Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input
                type="email"
                name="email"
                id="email"
                class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                value="{{ old('email', $user->email) }}"
                required
            >
        </div>

        <!-- Champ Rôle -->
        <div class="mb-4">
            <label for="role_id" class="block text-sm font-medium text-gray-700">Rôle</label>
            <select name="role_id" id="role_id" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Bouton -->
        <div class="flex justify-end">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md">
                Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection
