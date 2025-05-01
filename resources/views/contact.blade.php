@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-6">
    <h2 class="text-4xl font-bold text-center text-gray-800 mb-6 transition-all duration-300 hover:scale-105 hover:text-indigo-700">Contactez-nous</h2>
    <p class="text-center text-gray-500 mb-10">Une question ? Une demande ? Voici comment nous joindre.</p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        
        <!-- Section Contact -->
        <div class="bg-white shadow-xl rounded-lg p-6 hover:shadow-2xl transition-shadow duration-300">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Nos Coordonnées</h3>
            <p class="text-gray-500 mb-4">Vous pouvez nous contacter via les moyens suivants :</p>
            <div class="space-y-4">
                
                <!-- Adresse -->
                <div class="flex items-center space-x-3 group">
                    <svg class="w-6 h-6 text-indigo-600 group-hover:text-indigo-800 transition-colors duration-300" viewBox="0 0 48 48" fill="currentColor">
                        <path d="M24 4C14 4 6 12 6 22c0 7 5.4 14 12.3 19.9a3.6 3.6 0 003.7 0C36.6 36 42 29 42 22c0-10-8-18-18-18zm0 26a8 8 0 110-16 8 8 0 010 16z"/>
                    </svg>
                    <span class="text-gray-700 group-hover:text-indigo-600 transition-colors duration-300">AV Ouafae Oued el jaouaher, Narjis C, Fes</span>
                </div>
        
                <!-- Email -->
                <div class="flex items-center space-x-3 group">
                    <svg class="w-6 h-6 text-indigo-600 group-hover:text-indigo-800 transition-colors duration-300" viewBox="0 0 48 48" fill="currentColor">
                        <path d="M4 12c0-2.2 1.8-4 4-4h32c2.2 0 4 1.8 4 4v24c0 2.2-1.8 4-4 4H8c-2.2 0-4-1.8-4-4V12zm4 0l16 10 16-10v24H8V12zm16 10l16-10H8l16 10z"/>
                    </svg>
                    <span class="text-gray-700 group-hover:text-indigo-600 transition-colors duration-300">contact@education-site.com</span>
                </div>
        
                <!-- Téléphone -->
                <div class="flex items-center space-x-3 group">
                    <svg class="w-6 h-6 text-indigo-600 group-hover:text-indigo-800 transition-colors duration-300" viewBox="0 0 48 48" fill="currentColor">
                        <path d="M38 34c-3 3-6 4-10 4s-7-1-10-4c-5-5-7-10-7-15 0-4 1-7 4-10l3 3c-2 2-3 4-3 7s1 5 4 8c3 3 5 4 8 4s5-1 7-3l3 3z"/>
                    </svg>
                    <span class="text-gray-700 group-hover:text-indigo-600 transition-colors duration-300">08-08-60-87-01</span>
                </div>
            </div>
        </div>

        <!-- Carte Google Maps -->
        <div class="bg-white shadow-xl rounded-lg p-6 hover:shadow-2xl transition-shadow duration-300">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Notre Localisation</h3>
            <iframe class="w-full h-64 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3295.7461844886448!2d-4.976070339149942!3d34.01337692753093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9f8d1d1dec7417%3A0x8884218b8bec7ff0!2sIBN%20SOUDA%20ACADEMIC%20PRIVE!5e0!3m2!1sfr!2sma!4v1745927941309!5m2!1sfr!2sma"
                    frameborder="0"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>

    <!-- Réseaux sociaux -->
    <div class="mt-12 text-center">
        <h3 class="text-xl font-semibold text-gray-700">Suivez-nous</h3>
        <div class="flex justify-center space-x-6 mt-4">
            <!-- Instagram -->
            <a href="https://www.instagram.com/ibnsouda_academic?igsh=MXFwMzRtY3owZW14eQ==" 
               class="text-pink-500 hover:text-pink-700" 
               target="_blank" 
               rel="noopener noreferrer">
                <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M7.5 2h9A5.5 5.5 0 0122 7.5v9A5.5 5.5 0 0116.5 22h-9A5.5 5.5 0 012 16.5v-9A5.5 5.5 0 017.5 2zm0 2A3.5 3.5 0 004 7.5v9A3.5 3.5 0 007.5 20h9a3.5 3.5 0 003.5-3.5v-9A3.5 3.5 0 0016.5 4h-9zM12 7a5 5 0 110 10 5 5 0 010-10zm0 2a3 3 0 100 6 3 3 0 000-6zm5-3a1 1 0 112 0 1 1 0 01-2 0z"/>
                </svg>
            </a>

            <!-- WhatsApp -->
            <a href="https://wa.me/[TON-NUMERO]" 
               class="text-green-500 hover:text-green-700" 
               target="_blank" 
               rel="noopener noreferrer">
                <svg class="w-10 h-10" viewBox="0 0 32 32" fill="currentColor">
                    <path d="M16 3A13 13 0 003 16a12.94 12.94 0 001.87 6.65L3 29l6.52-1.85A12.94 12.94 0 0016 29a13 13 0 0013-13A13 13 0 0016 3zm6.43 17.88c-.27.76-1.35 1.41-1.9 1.5-.51.08-1.17.1-1.88-.03a8.55 8.55 0 01-4-1.86 14.29 14.29 0 01-2.7-3.3 3.92 3.92 0 01-.62-1.7 1.86 1.86 0 01.58-1.4c.33-.27.74-.3 1-.3h.29c.24 0 .44 0 .64.47s.79 1.92.86 2.06.1.24.18.38c.11.22.2.28.4.18s.46-.28.7-.45c.19-.15.43-.32.65-.26s.4.34.56.52a6.38 6.38 0 011.11 1.38c.14.27.25.47.38.68s.02.4-.06.55c-.12.2-.58.73-.78 1z"/>
                </svg>
            </a>
        </div>
    </div>
</div>
@endsection
