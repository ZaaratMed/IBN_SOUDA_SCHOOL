<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-800">
    <div class="min-h-screen flex flex-col">

        <!-- Header -->
        <header class="bg-white shadow-lg border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
                
                <!-- Logo & App Name -->
                <div class="flex items-center space-x-3">
                    <div class="bg-indigo-600 p-2 rounded-full shadow-md">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m0-6l-3.5-2m3.5 2l3.5-2" />
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-gray-800 tracking-tight">
                        {{ config('app.name', 'Laravel') }}
                    </span>
                </div>
                
        
                <!-- Navigation -->
                <nav class="hidden md:flex items-center space-x-6 text-sm font-medium text-gray-700">
                    <!-- Dashboard -->
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 hover:text-indigo-600 transition">
                        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 4v6H5v-6H3l9-9z" />
                        </svg>
                        <span>Tableau de bord</span>
                    </a>
        
                    <!-- Profil -->
                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 hover:text-indigo-600 transition">
                        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5.121 17.804A9 9 0 1118.88 6.196 9 9 0 015.12 17.804zM12 12a3 3 0 100-6 3 3 0 000 6z" />
                        </svg>
                        <span>Profil</span>
                    </a>
        
                    <!-- Déconnexion -->
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                                class="flex items-center gap-2 text-red-500 hover:text-red-600 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 16l4-4m0 0l-4-4m4 4H7" />
                                <path d="M3 21h18a2 2 0 002-2V5a2 2 0 00-2-2H3a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                            <span>Déconnexion</span>
                        </button>
                    </form>
                </nav>
            </div>
        </header>
        
        
        
        

        <!-- Main Content -->
        <main class="flex-grow bg-gray-50">
            <div class="max-w-5xl mx-auto py-12 px-6">
                <div class="bg-white shadow-lg rounded-2xl p-8">
                    @yield('content')
                </div>
            </div>
        </main>
        

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 mt-12">
            <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
                <div class="mb-4 md:mb-0">
                    © {{ date('Y') }} <span class="font-semibold text-gray-700">{{ config('app.name', 'Laravel') }}</span>. Tous droits réservés.
                </div>
        
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-indigo-600 transition">Mentions légales</a>
                    <a href="#" class="hover:text-indigo-600 transition">Politique de confidentialité</a>
                    <a href="#" class="hover:text-indigo-600 transition">Contact</a>
                </div>
            </div>
        </footer>
        
    </div>
</body>
</html>
