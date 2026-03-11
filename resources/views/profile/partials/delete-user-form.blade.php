<section class="space-y-6">
    <header class="flex items-start gap-4">
        <div class="p-3 bg-red-100 dark:bg-red-900/30 rounded-xl text-red-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </div>
        <div>
            <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">
                {{ __('Supprimer le compte') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Veuillez télécharger vos données importantes avant de continuer.') }}
            </p>
        </div>
    </header>

    <div class="pt-2">
        <x-danger-button
            class="px-6 py-2.5 rounded-xl shadow-lg shadow-red-500/20 transition-all hover:scale-105 active:scale-95"
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        >
            {{ __('Supprimer définitivement') }}
        </x-danger-button>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 bg-white dark:bg-gray-800 rounded-3xl border-t-4 border-red-500">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-black text-gray-900 dark:text-gray-100 flex items-center gap-2">
                <svg class="w-8 h-8 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                {{ __('Confirmation Requise') }}
            </h2>

            <p class="mt-4 text-sm text-gray-600 dark:text-gray-400 bg-red-50 dark:bg-red-900/10 p-4 rounded-xl border border-red-100 dark:border-red-900/20">
                {{ __('Cette action est irréversible. Pour confirmer que vous souhaitez supprimer définitivement votre compte Odin, veuillez saisir votre mot de passe ci-dessous.') }}
            </p>

            <div class="mt-8">
                <x-input-label for="password" value="{{ __('Mot de passe') }}" class="text-xs font-bold uppercase tracking-widest text-gray-500" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-2 block w-full rounded-xl border-gray-200 dark:border-gray-700 dark:bg-gray-900 focus:ring-red-500 focus:border-red-500 shadow-sm"
                    placeholder="••••••••••••"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-xs font-semibold" />
            </div>

            <div class="mt-8 flex flex-col sm:flex-row justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')" class="rounded-xl px-6 py-2.5 justify-center border-none bg-gray-100 dark:bg-gray-700 hover:bg-gray-200">
                    {{ __('Annuler') }}
                </x-secondary-button>

                <x-danger-button class="rounded-xl px-6 py-2.5 justify-center shadow-lg shadow-red-500/30">
                    {{ __('Confirmer la suppression') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>