<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-2xl font-black text-gray-900 dark:text-white uppercase tracking-tighter">Créer un compte</h2>
        <p class="text-[10px] text-gray-500 uppercase tracking-[0.2em] mt-2 font-bold">Commencez votre aventure avec Odin</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Nom complet')" class="uppercase text-[10px] tracking-widest font-black mb-2" />
            <x-text-input id="name" class="block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Adresse Email')" class="uppercase text-[10px] tracking-widest font-black mb-2" />
            <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="votre@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Mot de passe')" class="uppercase text-[10px] tracking-widest font-black mb-2" />
            <x-text-input id="password" class="block w-full" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" class="uppercase text-[10px] tracking-widest font-black mb-2" />
            <x-text-input id="password_confirmation" class="block w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-2 flex flex-col gap-4">
            <x-primary-button class="w-full justify-center py-4">
                {{ __('Créer mon compte') }}
            </x-primary-button>

            <div class="text-center">
                <a class="text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-blue-600 transition-colors" href="{{ route('login') }}">
                    {{ __('Déjà inscrit ? Se connecter') }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>