<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('links.index') }}" class="p-2 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 text-gray-500 hover:text-blue-600 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <h2 class="font-extrabold text-2xl text-gray-900 dark:text-white leading-tight">Modifier la Ressource</h2>
                <p class="text-sm text-gray-500 italic">Mise à jour de : {{ $link->title }}</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f8fafc] dark:bg-gray-950 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl shadow-amber-500/5 rounded-3xl overflow-hidden border border-gray-100 dark:border-gray-700">
                <div class="h-2 bg-gradient-to-r from-amber-400 to-orange-500"></div>

                <div class="p-8">
                    <form action="{{ route('links.update', $link) }}" method="POST" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <div class="space-y-2">
                            <label for="title" class="text-xs font-black uppercase tracking-widest text-gray-500 dark:text-gray-400 ml-1">Nom de la ressource</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none group-focus-within:text-amber-500 transition-colors">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </div>
                                <input type="text" name="title" id="title" value="{{ old('title', $link->title) }}" 
                                    class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 dark:bg-gray-900 border-gray-200 dark:border-gray-700 rounded-2xl focus:ring-2 focus:ring-amber-500 focus:bg-white dark:focus:bg-gray-800 transition-all text-gray-900 dark:text-white" required>
                            </div>
                            @error('title') <p class="text-xs text-red-500 mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="url" class="text-xs font-black uppercase tracking-widest text-gray-500 dark:text-gray-400 ml-1">Lien URL</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none group-focus-within:text-amber-500 transition-colors">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                                </div>
                                <input type="url" name="url" id="url" value="{{ old('url', $link->url) }}" 
                                    class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 dark:bg-gray-900 border-gray-200 dark:border-gray-700 rounded-2xl focus:ring-2 focus:ring-amber-500 focus:bg-white dark:focus:bg-gray-800 transition-all text-gray-900 dark:text-white" required>
                            </div>
                            @error('url') <p class="text-xs text-red-500 mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex items-center justify-between pt-6 border-t dark:border-gray-700">
                            <a href="{{ route('links.index') }}" class="text-sm font-bold text-gray-500 hover:text-gray-700 transition-colors">Annuler</a>
                            
                            <button type="submit" 
                                class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-white px-10 py-3.5 rounded-2xl font-black shadow-lg shadow-amber-500/30 transition-all active:scale-95">
                                <span>Mettre à jour</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>