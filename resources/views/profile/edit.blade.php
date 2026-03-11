<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="p-2 bg-blue-600 rounded-lg shadow-lg shadow-blue-500/30">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900 dark:text-white leading-tight">
                    {{ __('Paramètres du Compte') }}
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Gérez vos informations personnelles et la sécurité de votre accès Odin.</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f8fafc] dark:bg-gray-950 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="space-y-4">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700">
                        <h3 class="font-bold text-gray-800 dark:text-white mb-2">Statut du Compte</h3>
                        <div class="flex items-center gap-2 mb-4">
                            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                            <span class="text-sm text-gray-600 dark:text-gray-400 italic">Compte Actif</span>
                        </div>
                        <p class="text-xs text-gray-500 leading-relaxed">
                            Dernière mise à jour : <br>
                            <span class="font-semibold">{{ auth()->user()->updated_at->diffForHumans() }}</span>
                        </p>
                    </div>
                    
                    <div class="bg-blue-600 p-6 rounded-2xl shadow-lg shadow-blue-500/20 text-white">
                        <h3 class="font-bold mb-2">Sécurité Odin</h3>
                        <p class="text-xs opacity-80 leading-relaxed">
                            Nous vous recommandons de changer votre mot de passe régulièrement pour protéger vos ressources partagées.
                        </p>
                    </div>
                </div>

                <div class="md:col-span-2 space-y-8">
                    
                    <div class="bg-white dark:bg-gray-800 shadow-sm border border-gray-100 dark:border-gray-700 sm:rounded-2xl overflow-hidden transition-all hover:shadow-md">
                        <div class="p-4 border-b border-gray-50 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-700/30">
                             <h4 class="text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Informations Personnelles</h4>
                        </div>
                        <div class="p-6 sm:p-8">
                            <div class="max-w-xl">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 shadow-sm border border-gray-100 dark:border-gray-700 sm:rounded-2xl overflow-hidden transition-all hover:shadow-md">
                        <div class="p-4 border-b border-gray-50 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-700/30">
                             <h4 class="text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Sécurité du Mot de Passe</h4>
                        </div>
                        <div class="p-6 sm:p-8">
                            <div class="max-w-xl">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 shadow-sm border border-red-100 dark:border-red-900/30 sm:rounded-2xl overflow-hidden">
                        <div class="p-4 border-b border-red-50 dark:border-red-900/20 bg-red-50/30 dark:bg-red-900/10">
                             <h4 class="text-sm font-bold text-red-600 dark:text-red-400 uppercase tracking-wider">Zone de Danger</h4>
                        </div>
                        <div class="p-6 sm:p-8">
                            <div class="max-w-xl">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>