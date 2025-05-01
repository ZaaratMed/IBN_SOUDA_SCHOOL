<x-guest-layout>
    <div class="flex min-h-screen bg-gradient-to-br from-indigo-600 to-blue-500 justify-center items-center">
        <div class="bg-white shadow-xl rounded-2xl px-10 py-12 w-full max-w-md">
            
            <!-- En-tête d'inscription -->
            <h2 class="text-3xl font-bold text-center text-gray-800">Créer un compte</h2>
            <p class="text-gray-500 text-center">Remplissez les informations ci-dessous</p>

            <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-6">
                @csrf

                <!-- Nom -->
                <div>
                    <x-input-label for="name" :value="__('Nom')" class="text-gray-600 font-medium" />
                    <x-text-input id="name" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                  type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-600 font-medium" />
                    <x-text-input id="email" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                  type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Mot de passe -->
                <div>
                    <x-input-label for="password" :value="__('Mot de passe')" class="text-gray-600 font-medium" />
                    <x-text-input id="password" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                  type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Confirmation du mot de passe -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" class="text-gray-600 font-medium" />
                    <x-text-input id="password_confirmation" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                  type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Bouton d'inscription -->
                <div>
                    <x-primary-button class="w-full py-3 bg-indigo-600 text-white font-bold rounded-lg shadow-md hover:bg-indigo-700 transition duration-300">
                        {{ __('Créer un compte') }}
                    </x-primary-button>
                </div>

                <!-- Lien pour se connecter -->
                <div class="text-center mt-6 text-gray-500">
                    Déjà inscrit ? <a href="{{ route('login') }}" class="text-indigo-500 hover:underline">Connectez-vous</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
