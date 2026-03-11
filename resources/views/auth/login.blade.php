<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-2xl font-black text-gray-900 dark:text-white uppercase tracking-tighter">Accès Portail</h2>
        <p class="text-[10px] text-gray-500 uppercase tracking-[0.2em] mt-2 font-bold">Connectez-vous à votre espace Odin</p>
    </div>

    <x-auth-session-status class="mb-6" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Identifiant Email')" class="uppercase text-[10px] tracking-widest font-black mb-2" />
            <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="votre@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <div class="flex justify-between items-center mb-2">
                <x-input-label for="password" :value="__('Mot de passe')" class="uppercase text-[10px] tracking-widest font-black" />
                @if (Route::has('password.request'))
                    <a class="text-[9px] font-black uppercase tracking-widest text-blue-600 hover:text-blue-500 transition-colors" href="{{ route('password.request') }}">
                        {{ __('Oublié ?') }}
                    </a>
                @endif
            </div>
            <x-text-input id="password" class="block w-full" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" class="rounded-lg border-gray-300 dark:border-gray-800 dark:bg-gray-950 text-blue-600 shadow-sm focus:ring-blue-500/20 transition-all cursor-pointer" name="remember">
                <span class="ms-2 text-[11px] font-bold uppercase tracking-wider text-gray-500 group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors">{{ __('Rester connecté') }}</span>
            </label>
        </div>

        <div class="pt-2 flex flex-col gap-4">
            <x-primary-button class="w-full justify-center py-4">
                {{ __('Se Connecter') }}
            </x-primary-button>

            <div class="text-center">
                <a class="text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-blue-600 transition-colors" href="{{ route('register') }}">
                    {{ __('Pas encore de compte ? Créer un profil') }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>