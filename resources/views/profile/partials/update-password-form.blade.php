<section>
    <header class="flex items-center gap-3 mb-8">
        <div class="p-2 bg-amber-100 dark:bg-amber-900/30 rounded-lg text-amber-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </div>
        <div>
            <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100 uppercase tracking-tight">
                {{ __('Sécurité du Compte') }}
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                {{ __('Utilisez un mot de passe robuste pour protéger vos accès.') }}
            </p>
        </div>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <x-input-label for="update_password_current_password" :value="__('Mot de passe actuel')" class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase ml-1" />
                <x-text-input id="update_password_current_password" name="current_password" type="password" 
                    class="mt-1 block w-full rounded-xl border-gray-200 dark:border-gray-700 dark:bg-gray-900 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm" 
                    autocomplete="current-password" placeholder="••••••••••••" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-xs" />
            </div>

            <div>
                <x-input-label for="update_password_password" :value="__('Nouveau mot de passe')" class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase ml-1" />
                <x-text-input id="update_password_password" name="password" type="password" 
                    class="mt-1 block w-full rounded-xl border-gray-200 dark:border-gray-700 dark:bg-gray-900 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm" 
                    autocomplete="new-password" placeholder="Min. 8 caractères" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-xs" />
            </div>

            <div>
                <x-input-label for="update_password_password_confirmation" :value="__('Confirmer le mot de passe')" class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase ml-1" />
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                    class="mt-1 block w-full rounded-xl border-gray-200 dark:border-gray-700 dark:bg-gray-900 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm" 
                    autocomplete="new-password" placeholder="••••••••••••" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-xs" />
            </div>
        </div>

        <div class="flex items-center gap-4 pt-4">
            <x-primary-button class="px-8 py-2.5 bg-blue-600 hover:bg-blue-700 rounded-xl shadow-lg shadow-blue-500/20 active:scale-95 transition-all uppercase tracking-widest text-xs font-black">
                {{ __('Mettre à jour') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center gap-2 text-sm text-green-600 dark:text-green-400 font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    {{ __('Modifié avec succès.') }}
                </div>
            @endif
        </div>
    </form>
</section>