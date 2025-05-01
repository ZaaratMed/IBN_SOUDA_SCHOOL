<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Éducation Premium') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-gray-50 to-gray-200 text-gray-900">

    <div class="min-h-screen flex flex-col">

        <!-- Header -->
        <header class="bg-gradient-to-r from-indigo-600 via-purple-500 to-blue-500 shadow-2xl border-b border-gray-300">
            <div class="max-w-7xl mx-auto px-6 py-6 flex items-center justify-between">
                
                <!-- Logo & App Name -->
                <div class="flex items-center space-x-4 hover:scale-105 transition-transform duration-300">
                    <div class="flex items-center justify-center w-12 h-12 bg-white rounded-full shadow-lg">
                        <svg class="h-8 w-8 text-indigo-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M4 6h16M4 12h16M4 18h7M16 18h4" />
                            <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                        </svg>
                    </div>
                    <span class="text-4xl font-extrabold text-white tracking-wide">
                        {{ config('app.name', 'Éducation Premium') }}
                    </span>
                </div>

                <!-- Navigation -->
                <nav class="hidden md:flex items-center space-x-6 text-lg font-medium text-white">
                    @auth
                        <!-- Dashboard -->
                        <a href="{{ route('dashboard') }}" class="hover:text-yellow-300 transition duration-300">
                            Tableau de bord
                        </a>

                        <!-- Profil -->
                        <a href="{{ route('profile.edit') }}" class="hover:text-yellow-300 transition duration-300">
                            Profil
                        </a>

                        <!-- Déconnexion -->
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-red-300 hover:text-red-500 transition">
                                Déconnexion
                            </button>
                        </form>
                    @endauth

                    @guest
                        <a href="{{ route('presentation.show') }}" class="hover:text-yellow-300 transition duration-300">Accueil</a>
                        <a href="{{ route('login') }}" class="hover:text-yellow-300 transition duration-300">Se connecter</a>
                        <a href="{{ route('register') }}" class="hover:text-yellow-300 transition duration-300">S'inscrire</a>
                    @endguest
                </nav>
            </div>
        </header>
;
        <!-- Main Content -->
        <main class="flex-grow">
            <div class="max-w-5xl mx-auto py-16 px-8">
                <div class="bg-white shadow-xl rounded-3xl p-10 hover:shadow-3xl transition-shadow duration-300">
                    @yield('content')
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white mt-12 py-6">
            <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center text-lg">
                <div class="mb-4 md:mb-0">
                    © {{ date('Y') }} <span class="font-semibold">{{ config('app.name', 'Éducation Premium') }}</span>. Tous droits réservés.
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="hover:text-yellow-300 transition duration-300">Mentions légales</a>
                    <a href="#" class="hover:text-yellow-300 transition duration-300">Politique de confidentialité</a>
                    <a href="{{route('contact')}}" class="hover:text-yellow-300 transition duration-300">Contact</a>
                </div>
            </div>
        </footer>

    </div>

</body>
</html>
