<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12">Registrarse</h1>   
        <form class="mt-6" method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label class="block text-gray-700">Nombres</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Ingresa tus nombres" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required>
            </div>

            <!-- SurName -->
            <div>
                <label class="block text-gray-700">Apellidos</label>
                <input type="text" name="surname" id="surname" value="{{ old('surname') }}" placeholder="Ingresa tus apellidos" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autocomplete required>
            </div>

            <!-- Email Address -->
            <div>
                <label class="block text-gray-700">Correo</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Ingresa tu correo" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label class="block text-gray-700">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña" value="" autocomplete="current-password" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                focus:bg-white focus:outline-none" required>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label class="block text-gray-700">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" value="" autocomplete="current-password" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                focus:bg-white focus:outline-none" required>
            </div>

            <button type="submit" class="w-full block bg-indigo-500 hover:bg-indigo-400 focus:bg-indigo-400 text-white font-semibold rounded-lg
                px-4 py-3 mt-6">
                {{ __('Register') }}
            </button>
        </form>
    </x-auth-card>
</x-guest-layout>
