<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('links.index') }}" class="p-2 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 text-gray-500 hover:text-blue-600 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <h2 class="font-extrabold text-2xl text-gray-900 dark:text-white tracking-tight">Détails de la Ressource</h2>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f8fafc] dark:bg-gray-950 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl shadow-blue-500/5 rounded-3xl overflow-hidden border border-gray-100 dark:border-gray-700">
                
                <div class="p-8 md:p-12 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-800/50 dark:to-blue-900/10 border-b dark:border-gray-700">
                    <div class="flex flex-col md:flex-row justify-between items-start gap-6">
                        <div class="space-y-3">
                            <span class="px-3 py-1 bg-blue-600 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-full">Lien Externe</span>
                            <h1 class="text-3xl md:text-4xl font-black text-gray-900 dark:text-white leading-none">{{ $link->title }}</h1>
                            <p class="text-gray-500 dark:text-gray-400 text-sm">Ajouté par <span class="font-bold text-blue-600 italic">{{ $link->user->name }}</span> • {{ $link->created_at->format('d M, Y') }}</p>
                        </div>
                        
                        <div class="flex gap-2">
                            @can('update', $link)
                                <a href="{{ route('links.edit', $link) }}" class="p-3 bg-white dark:bg-gray-700 rounded-2xl shadow-sm border dark:border-gray-600 text-amber-600 hover:scale-105 transition-transform">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="p-8 space-y-8">
                    <div class="group relative p-6 bg-gray-50 dark:bg-gray-900 rounded-3xl border-2 border-dashed border-gray-200 dark:border-gray-700 hover:border-blue-400 transition-colors">
                        <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 block">Destination URL</label>
                        <div class="flex items-center justify-between gap-4">
                            <span class="text-lg font-mono text-blue-600 dark:text-blue-400 break-all select-all">{{ $link->url }}</span>
                            <a href="{{ $link->url }}" target="_blank" class="shrink-0 bg-blue-600 text-white p-3 rounded-xl shadow-lg shadow-blue-500/30 hover:bg-blue-700 active:scale-95 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-4 bg-white dark:bg-gray-800 border dark:border-gray-700 rounded-2xl flex items-center gap-4">
                            <div class="p-2 bg-green-100 dark:bg-green-900/30 text-green-600 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <p class="text-[10px] uppercase font-bold text-gray-400">Statut</p>
                                <p class="text-sm font-bold dark:text-white">Vérifié & Actif</p>
                            </div>
                        </div>
                        <div class="p-4 bg-white dark:bg-gray-800 border dark:border-gray-700 rounded-2xl flex items-center gap-4">
                            <div class="p-2 bg-purple-100 dark:bg-purple-900/30 text-purple-600 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            </div>
                            <div>
                                <p class="text-[10px] uppercase font-bold text-gray-400">Visibilité</p>
                                <p class="text-sm font-bold dark:text-white">{{ $link->is_shared ? 'Public (Équipe)' : 'Privé (Moi)' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>