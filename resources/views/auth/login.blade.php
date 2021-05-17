<x-guest-layout>
    <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12">Iniciar sesión con tu cuenta</h1>   
        <form class="mt-6" action="{{ route('login') }}" method="POST">
            @csrf

            <div>
                <label class="block text-gray-700">Correo</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Ingresa tu correo" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required>
            </div>

            <div class="mt-4">
                <label class="block text-gray-700">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña" value="" autocomplete="current-password" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                focus:bg-white focus:outline-none" required>
            </div>

            @if (Route::has('password.request'))
            <div class="text-right mt-2">
                <a href="{{ route('password.request') }}" class="text-sm font-semibold text-gray-700 hover:text-blue-700 focus:text-blue-700">{{ __('Se te olvido tu contraseña?') }}</a>
            </div>
            @endif

            <button type="submit" class="w-full block bg-indigo-500 hover:bg-indigo-400 focus:bg-indigo-400 text-white font-semibold rounded-lg
                px-4 py-3 mt-6">
                Iniciar
            </button>
        </form>
    </x-auth-card>
</x-guest-layout>
