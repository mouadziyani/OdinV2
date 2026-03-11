<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('links.index') }}" class="p-2 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 text-gray-500 hover:text-blue-600 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900 dark:text-white leading-tight">
                    {{ __('Nouvelle Ressource') }}
                </h2>
                <p class="text-sm text-gray-500">Ajoutez un lien vers un outil, une documentation ou un projet.</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f8fafc] dark:bg-gray-950 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 shadow-xl shadow-blue-500/5 rounded-3xl overflow-hidden border border-gray-100 dark:border-gray-700">
                <div class="h-2 bg-gradient-to-r from-blue-400 to-indigo-600"></div>

                <div class="p-8">
                    @if ($errors->any())
                        <div class="mb-8 p-4 bg-red-50 dark:bg-red-900/10 border-l-4 border-red-500 rounded-r-xl">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                <span class="font-bold text-red-800 dark:text-red-400 text-sm">Veuillez corriger les erreurs suivantes :</span>
                            </div>
                            <ul class="list-disc list-inside text-xs text-red-700 dark:text-red-300 space-y-1 ml-7">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('links.store') }}" method="POST" class="space-y-8">
                        @csrf

                        <div class="space-y-2">
                            <label for="title" class="text-xs font-black uppercase tracking-widest text-gray-500 dark:text-gray-400 ml-1">
                                Nom de la ressource
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <input type="text" name="title" id="title" value="{{ old('title') }}" 
                                    class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 dark:bg-gray-900 border-gray-200 dark:border-gray-700 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:bg-white dark:focus:bg-gray-800 transition-all text-gray-900 dark:text-white placeholder-gray-400"
                                    placeholder="Ex: Documentation API Odin" required>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="url" class="text-xs font-black uppercase tracking-widest text-gray-500 dark:text-gray-400 ml-1">
                                Lien URL (Lien source)
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                                </div>
                                <input type="url" name="url" id="url" value="{{ old('url') }}" 
                                    class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 dark:bg-gray-900 border-gray-200 dark:border-gray-700 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:bg-white dark:focus:bg-gray-800 transition-all text-gray-900 dark:text-white placeholder-gray-400"
                                    placeholder="https://example.com/ressource" required>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-6 border-t dark:border-gray-700">
                            <a href="{{ route('links.index') }}" class="text-sm font-bold text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition-colors">
                                Annuler
                            </a>
                            
                            <button type="submit" 
                                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-10 py-3.5 rounded-2xl font-black shadow-lg shadow-blue-500/30 transition-all active:scale-95">
                                <span>Créer la ressource</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <p class="mt-6 text-center text-xs text-gray-400">
                Astuce : Assurez-vous que le lien est accessible par les membres de votre équipe.
            </p>
        </div>
    </div>
</x-app-layout>