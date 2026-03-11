<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="font-extrabold text-3xl text-gray-900 dark:text-white tracking-tight">
                    Mes <span class="text-blue-600">Ressources</span>
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Gérez vos liens et partagez-les avec votre équipe.</p>
            </div>
            
            <a href="{{ route('links.create') }}" 
               class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-bold shadow-lg shadow-blue-500/20 transition-all active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Nouveau Lien
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f8fafc] dark:bg-gray-950 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div class="flex items-center gap-3 bg-green-50 dark:bg-green-900/10 border border-green-100 dark:border-green-800 p-4 rounded-xl text-green-700 dark:text-green-400 shadow-sm animate-bounce">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="font-bold text-sm">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 shadow-sm border border-gray-100 dark:border-gray-700 rounded-3xl overflow-hidden">
                @if($links->count())
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-gray-50/50 dark:bg-gray-700/50 border-b dark:border-gray-700">
                                    <th class="px-6 py-4 text-xs font-black uppercase tracking-widest text-gray-400">Ressource</th>
                                    <th class="px-6 py-4 text-xs font-black uppercase tracking-widest text-gray-400">Visibilité</th>
                                    <th class="px-6 py-4 text-xs font-black uppercase tracking-widest text-gray-400">Propriétaire</th>
                                    <th class="px-6 py-4 text-right text-xs font-black uppercase tracking-widest text-gray-400">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y dark:divide-gray-700">
                                @foreach($links as $link)
                                    <tr class="group hover:bg-blue-50/30 dark:hover:bg-blue-900/5 transition-all">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-4">
                                                <button class="{{ $link->is_favorite ? 'text-amber-400' : 'text-gray-300 hover:text-amber-400' }} transition-colors">
                                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                                                </button>

                                                <div class="flex flex-col">
                                                    <span class="font-bold text-gray-900 dark:text-white group-hover:text-blue-600 transition-colors">{{ $link->title }}</span>
                                                    <a href="{{ $link->url }}" target="_blank" class="text-xs text-gray-400 hover:text-blue-400 flex items-center gap-1">
                                                        {{ Str::limit($link->url, 40) }}
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold {{ $link->is_shared ? 'bg-purple-100 text-purple-700' : 'bg-gray-100 text-gray-600' }}">
                                                {{ $link->is_shared ? 'Partagé' : 'Privé' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                            <div class="flex items-center gap-2">
                                                <div class="w-7 h-7 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center text-blue-600 font-bold text-[10px]">
                                                    {{ substr($link->user->name, 0, 1) }}
                                                </div>
                                                {{ $link->user->name == auth()->user()->name ? 'Moi' : $link->user->name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex justify-end items-center gap-3">
                                                <a href="{{ route('links.show', $link) }}" class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-all" title="Détails">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                                </a>

                                                @can('update', $link)
                                                    <a href="{{ route('links.edit', $link) }}" class="p-2 text-gray-400 hover:text-amber-600 hover:bg-amber-50 dark:hover:bg-amber-900/20 rounded-lg transition-all" title="Modifier">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                                    </a>
                                                @endcan

                                                @can('delete', $link)
                                                    <form action="{{ route('links.destroy', $link) }}" method="POST" class="inline">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Déplacer vers la corbeille ?')" 
                                                                class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-all" title="Supprimer">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="p-20 text-center">
                        <div class="inline-flex p-6 bg-blue-50 dark:bg-gray-700 rounded-full mb-4">
                            <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                        </div>
                        <h3 class="text-xl font-bold dark:text-white">Aucun lien pour le moment</h3>
                        <p class="text-gray-500 mt-2">Commencez par ajouter votre premier lien vers une ressource.</p>
                        <a href="{{ route('links.create') }}" class="mt-6 inline-block bg-blue-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg">Ajouter mon premier lien</a>
                    </div>
                @endif
            </div>

            <div class="flex justify-center">
                <a href="#" class="text-sm font-bold text-gray-400 hover:text-blue-600 transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    Voir la Corbeille
                </a>
            </div>

        </div>
    </div>
</x-app-layout>