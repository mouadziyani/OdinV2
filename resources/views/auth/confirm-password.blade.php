<x-guest-layout>
    <div class="mb-8 text-center">
        <div class="inline-flex p-3 rounded-2xl bg-indigo-50 dark:bg-indigo-900/20 mb-4">
            <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
            </svg>
        </div>
        <h2 class="text-xl font-black text-gray-900 dark:text-white uppercase tracking-tighter">Zone Sécurisée</h2>
        <p class="mt-3 text-[11px] text-gray-500 dark:text-gray-400 leading-relaxed uppercase tracking-widest font-bold px-4">
            {{ __('Ceci est une zone sécurisée. Veuillez confirmer votre mot de passe avant de continuer.') }}
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
        @csrf

        <div>
            <x-input-label for="password" :value="__('Mot de passe')" class="uppercase text-[10px] tracking-widest font-black mb-2" />
            <x-text-input id="password" class="block w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" 
                            placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center py-4">
                {{ __('Confirmer l\'accès') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>