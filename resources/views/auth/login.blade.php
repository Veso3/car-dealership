<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-4 text-center">
        <h2 class="text-2xl font-bold text-gray-900">Admin-Anmeldung</h2>
        <p class="text-sm text-gray-600 mt-1">Nur Administratoren können auf dieses System zugreifen</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email">E-Mail</x-input-label>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password">Passwort</x-input-label>

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">Angemeldet bleiben</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                Admin-Anmeldung
            </x-primary-button>
        </div>
        
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">Nur Administratoren können auf dieses System zugreifen.</p>
        </div>
    </form>
</x-guest-layout>
