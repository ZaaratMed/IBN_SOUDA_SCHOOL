<x-guest-layout>
    <div class="flex min-h-screen bg-gradient-to-br from-indigo-600 to-blue-500 justify-center items-center">
        <div class="bg-white shadow-xl rounded-2xl px-8 py-10 w-full max-w-md">
            
            <!-- En-tête de connexion -->
            <h2 class="text-3xl font-bold text-center text-gray-800">Bienvenue</h2>
            <p class="text-gray-500 text-center">Veuillez vous connecter pour continuer</p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-600 font-medium" />
                    <x-text-input id="email" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Mot de passe')" class="text-gray-600 font-medium" />
                    <x-text-input id="password" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                  type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center text-sm text-gray-600">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2">Se souvenir de moi</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-500 hover:underline">Mot de passe oublié ?</a>
                    @endif
                </div>

                <!-- Bouton de connexion -->
                <div>
                    <x-primary-button class="w-full py-3 bg-indigo-600 text-white font-bold rounded-lg shadow-md hover:bg-indigo-700 transition duration-300">
                        {{ __('Se connecter') }}
                    </x-primary-button>
                </div>

                <!-- Lien d'inscription -->
                <div class="text-center mt-6 text-gray-500">
                    Pas encore de compte ? <a href="{{ route('register') }}" class="text-indigo-500 hover:underline">Inscrivez-vous</a>
                </div>

            </form>
        </div>
    </div>
</x-guest-layout>
