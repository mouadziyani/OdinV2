<section>
    <header class="flex items-center gap-3 mb-8">
        <div class="p-2 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg text-indigo-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
        </div>
        <div>
            <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100 uppercase tracking-tight">
                {{ __('Détails du Profil') }}
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                {{ __("Mettez à jour vos informations d'identification sur la plateforme.") }}
            </p>
        </div>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-1">
                <x-input-label for="name" :value="__('Nom complet')" class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase ml-1" />
                <x-text-input id="name" name="name" type="text" 
                    class="mt-1 block w-full rounded-xl border-gray-200 dark:border-gray-700 dark:bg-gray-900 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm" 
                    :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2 text-xs" :messages="$errors->get('name')" />
            </div>

            <div class="md:col-span-1">
                <x-input-label for="email" :value="__('Adresse Email')" class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase ml-1" />
                <x-text-input id="email" name="email" type="email" 
                    class="mt-1 block w-full rounded-xl border-gray-200 dark:border-gray-700 dark:bg-gray-900 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm" 
                    :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2 text-xs" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-4 p-4 bg-amber-50 dark:bg-amber-900/10 border border-amber-100 dark:border-amber-900/20 rounded-xl">
                        <p class="text-xs text-amber-700 dark:text-amber-400 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                            {{ __('Votre email n\'est pas encore vérifié.') }}
                        </p>

                        <button form="send-verification" class="mt-2 text-xs font-bold text-blue-600 dark:text-blue-400 hover:underline focus:outline-none">
                            {{ __('Renvoyer le lien de vérification') }}
                        </button>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-semibold text-xs text-green-600 dark:text-green-400">
                                {{ __('Un nouveau lien a été envoyé.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="flex items-center gap-4 pt-4 border-t dark:border-gray-700">
            <x-primary-button class="px-8 py-2.5 bg-blue-600 hover:bg-blue-700 rounded-xl shadow-lg shadow-blue-500/20 active:scale-95 transition-all uppercase tracking-widest text-xs font-black">
                {{ __('Enregistrer') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center gap-2 text-sm text-green-600 dark:text-green-400 font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    {{ __('Mise à jour réussie.') }}
                </div>
            @endif
        </div>
    </form>
</section>