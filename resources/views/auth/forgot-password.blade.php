<x-guest-layout>
    <div class="mb-8 text-center">
        <div class="inline-flex p-3 rounded-2xl bg-blue-50 dark:bg-blue-900/20 mb-4">
            <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
        </div>
        <h2 class="text-xl font-black text-gray-900 dark:text-white uppercase tracking-tighter">Mot de passe oublié ?</h2>
        <p class="mt-3 text-[11px] text-gray-500 dark:text-gray-400 leading-relaxed uppercase tracking-widest font-bold">
            {{ __('Pas de soucis. Entrez votre email et nous vous enverrons un lien pour sécuriser à nouveau votre compte.') }}
        </p>
    </div>

    <x-auth-session-status class="mb-6" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Votre Adresse Email')" class="uppercase text-[10px] tracking-widest font-black mb-2" />
            <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="nom@exemple.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="pt-2 flex flex-col gap-4">
            <x-primary-button class="w-full justify-center py-4">
                {{ __('Envoyer le lien de récupération') }}
            </x-primary-button>

            <div class="text-center">
                <a class="text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-blue-600 transition-colors" href="{{ route('login') }}">
                    {{ __('Retour à la connexion') }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>