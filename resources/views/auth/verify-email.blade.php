<x-guest-layout>
    <div class="flex justify-center mb-6">
        <div class="p-4 bg-blue-50 dark:bg-blue-900/20 rounded-full">
            <svg class="w-10 h-10 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
        </div>
    </div>

    <div class="mb-6 text-center">
        <h2 class="text-xl font-black text-gray-900 dark:text-white uppercase tracking-tighter">Vérifiez votre email</h2>
        <p class="mt-3 text-sm text-gray-600 dark:text-gray-400 leading-relaxed px-2">
            {{ __('Merci de nous avoir rejoint ! Avant de commencer, pourriez-vous vérifier votre adresse email en cliquant sur le lien que nous venons de vous envoyer ? Si vous ne l\'avez pas reçu, nous vous en enverrons un autre avec plaisir.') }}
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <x-auth-session-status class="mb-6" :status="__('Un nouveau lien de vérification a été envoyé à l\'adresse email fournie lors de l\'inscription.')" />
    @endif

    <div class="mt-8 flex flex-col gap-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button class="w-full justify-center py-4">
                <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><path d="M22 6l-10 7L2 6"/></svg>
                {{ __('Renvoyer l\'email de vérification') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="text-center">
            @csrf
            <button type="submit" class="text-xs font-black uppercase tracking-[0.2em] text-gray-400 hover:text-red-500 transition-colors duration-200">
                {{ __('Se déconnecter') }}
            </button>
        </form>
    </div>
</x-guest-layout>