@extends('layouts.app')

@section('content')
<div class="py-16 bg-gradient-to-br from-gray-50 to-white">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
        
        <!-- En-tête du profil avec animation -->
        <div class="text-center">
            <h2 class="text-5xl font-extrabold text-gray-800 transition-all duration-500 hover:text-indigo-600">
                Mon Profil
            </h2>
            <p class="text-lg text-gray-500 mt-2">Gérez vos informations et votre sécurité</p>
        </div>

        <!-- Informations personnelles -->
        <div class="p-8 bg-white bg-opacity-80 backdrop-blur-lg shadow-xl rounded-2xl border border-gray-200 transition-all duration-500 hover:shadow-2xl hover:scale-105">
            <h3 class="text-3xl font-semibold text-gray-700 mb-6">Informations personnelles</h3>
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Sécurité du compte -->
        <div class="p-8 bg-white bg-opacity-80 backdrop-blur-lg shadow-xl rounded-2xl border border-gray-200 transition-all duration-500 hover:shadow-2xl hover:scale-105">
            <h3 class="text-3xl font-semibold text-gray-700 mb-6">Sécurité du compte</h3>
            <p class="text-gray-500 mb-4">Modifiez votre mot de passe régulièrement pour renforcer votre sécurité.</p>
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Suppression du compte avec alerte visuelle -->
        <div class="p-8 bg-red-50 bg-opacity-90 backdrop-blur-lg shadow-xl rounded-2xl border border-red-300 transition-all duration-500 hover:shadow-2xl hover:scale-105">
            <h3 class="text-3xl font-semibold text-red-700 mb-6">⚠️ Supprimer mon compte</h3>
            <p class="text-red-500 mb-4">Cette action est **irréversible**. Assurez-vous de bien vouloir supprimer votre compte.</p>
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>
</div>
@endsection
