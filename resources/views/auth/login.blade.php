<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" autocomplete="off">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" /> 
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4 flex justify-between items-center">
            
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-beige-400 text-beige-800 shadow-sm focus:ring-beige-700 bg-beige-200" name="remember">
                <span class="ms-2 text-sm text-beige-900">{{ __('Lembrar-me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-beige-900 hover:text-beige-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-beige-400 focus:ring-offset-beige-100 transition" href="{{ route('password.request') }}">
                    {{ __('Esqueceu sua senha?') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-end mt-6">
            <a class="text-sm text-beige-900 hover:text-beige-700 mr-4 transition" href="{{ route('register') }}">
                {{ __('Ainda não tem conta?') }}
            </a>
            <x-primary-button>
                {{ __('Entrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>