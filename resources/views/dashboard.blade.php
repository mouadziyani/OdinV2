<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="font-[1000] text-3xl text-gray-900 dark:text-white tracking-tighter uppercase">
                    Odin <span class="text-blue-600">Core</span>
                </h2>
                <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mt-1">
                    Système de Gestion de Ressources v1.0
                </p>
            </div>

            <div class="flex items-center gap-3">
                @php
                    $role = auth()->user()->roles->first()?->name ?? 'viewer';
                    $roleColor = match($role) {
                        'admin' => 'bg-red-500 shadow-red-500/20',
                        'editor' => 'bg-amber-500 shadow-amber-500/20',
                        default => 'bg-blue-600 shadow-blue-500/20',
                    };
                @endphp
                <span class="{{ $roleColor }} text-white text-[10px] font-black px-4 py-2 rounded-xl shadow-lg uppercase tracking-[0.2em]">
                    Auth: {{ $role }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f8fafc] dark:bg-[#020617] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="flex flex-wrap gap-4 items-center justify-between bg-white dark:bg-gray-900 p-6 rounded-[2rem] border border-gray-100 dark:border-gray-800 shadow-xl shadow-blue-500/5">
                <div class="flex flex-wrap gap-3">
                    @can('create', App\Models\Link::class)
                        <a href="{{ route('links.create') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-xs font-black uppercase tracking-widest rounded-2xl transition-all active:scale-95 shadow-lg shadow-blue-500/20">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            Nouveau Lien
                        </a>
                    @endcan

                    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('editor'))
                        <a href="{{ route('categories.create') }}" class="inline-flex items-center px-6 py-3 bg-gray-900 dark:bg-gray-800 hover:bg-gray-800 text-white text-xs font-black uppercase tracking-widest rounded-2xl transition-all active:scale-95 border border-transparent dark:border-gray-700">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                            Catégorie
                        </a>
                        <a href="{{ route('tags.create') }}" class="inline-flex items-center px-6 py-3 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-gray-50 transition-all active:scale-95">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                            Tag
                        </a>
                    @endif
                </div>

                @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('links.trash') }}" class="text-[10px] font-black uppercase tracking-widest text-red-500 hover:text-red-600 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    Corbeille
                </a>
                @endif
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $stats = [
                        ['label' => 'Ressources', 'value' => \App\Models\Link::count(), 'icon' => 'link', 'color' => 'blue'],
                        ['label' => 'Favoris', 'value' => auth()->user()->favoriteLinks()->count(), 'icon' => 'star', 'color' => 'amber'],
                        ['label' => 'Partages', 'value' => \DB::table('link_user')->count(), 'icon' => 'share', 'color' => 'emerald'],
                        ['label' => 'Archives', 'value' => \App\Models\Link::onlyTrashed()->count(), 'icon' => 'trash', 'color' => 'red'],
                    ];
                @endphp

                @foreach($stats as $stat)
                <div class="bg-white dark:bg-gray-900 p-8 rounded-[2rem] border border-transparent hover:border-{{ $stat['color'] }}-500/50 transition-all duration-500 shadow-xl shadow-blue-500/5 group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">{{ $stat['label'] }}</p>
                            <h3 class="text-3xl font-[1000] mt-1 dark:text-white group-hover:text-{{ $stat['color'] }}-500 transition-colors">{{ $stat['value'] }}</h3>
                        </div>
                        <div class="p-4 bg-{{ $stat['color'] }}-50 dark:bg-{{ $stat['color'] }}-900/10 rounded-2xl transition-transform group-hover:scale-110">
                            <div class="w-6 h-6 text-{{ $stat['color'] }}-600">
                                @if($stat['icon'] == 'link') <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg> @endif
                                @if($stat['icon'] == 'star') <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.382-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg> @endif
                                @if($stat['icon'] == 'share') <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg> @endif
                                @if($stat['icon'] == 'trash') <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg> @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 bg-white dark:bg-gray-900 rounded-[2.5rem] border border-gray-100 dark:border-gray-800 shadow-xl shadow-blue-500/5 overflow-hidden">
                    <div class="p-8 border-b dark:border-gray-800 flex justify-between items-center bg-gray-50/50 dark:bg-gray-800/50">
                        <h3 class="font-black text-gray-900 dark:text-white text-sm uppercase tracking-widest">Répertoire de Ressources</h3>
                        <a href="{{ route('links.index') }}" class="text-blue-600 text-[10px] font-black uppercase tracking-widest hover:text-blue-500 transition-colors">Explorer tout</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-white dark:bg-gray-900 text-gray-400 text-[10px] uppercase tracking-widest text-left">
                                <tr>
                                    <th class="px-8 py-5">Identifiant / URL</th>
                                    <th class="px-8 py-5">Statut</th>
                                    <th class="px-8 py-5 text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50 dark:divide-gray-800">
                                @forelse(\App\Models\Link::with('user')->latest()->take(5)->get() as $link)
                                <tr class="hover:bg-blue-50/30 dark:hover:bg-blue-900/5 transition-colors group">
                                    <td class="px-8 py-5">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-2xl bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-gray-500 mr-4 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300 shadow-sm">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                                            </div>
                                            <div>
                                                <p class="font-black text-gray-900 dark:text-white text-sm tracking-tight leading-tight">{{ $link->title }}</p>
                                                <p class="text-[10px] text-gray-400 font-bold mt-1 truncate max-w-[200px] uppercase tracking-tighter">{{ $link->url }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5">
                                        <span class="text-[9px] font-black px-3 py-1 bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-gray-400 rounded-full uppercase tracking-tighter">
                                            {{ $link->user->name }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-5 text-right">
                                        <div class="flex justify-end gap-2">
                                            @can('update', $link)
                                                <a href="{{ route('links.edit', $link) }}" class="p-2 text-gray-400 hover:text-blue-600 transition-colors">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                                </a>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="px-8 py-12 text-center text-[10px] font-black uppercase tracking-widest text-gray-300">Aucun enregistrement actif</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-900 rounded-[2.5rem] border border-gray-100 dark:border-gray-800 p-8 shadow-xl shadow-blue-500/5">
                    <h3 class="font-black text-gray-900 dark:text-white text-sm uppercase tracking-widest mb-8">Journal Système</h3>
                    <div class="space-y-8">
                        @forelse(\App\Models\ActivityLog::latest()->take(6)->get() as $log)
                        <div class="flex gap-4 relative group">
                            <div class="flex flex-col items-center">
                                <div class="w-3 h-3 rounded-full bg-blue-600 border-4 border-blue-100 dark:border-blue-900/30 z-10"></div>
                                <div class="w-[2px] h-full bg-gray-100 dark:bg-gray-800 absolute top-3"></div>
                            </div>
                            <div class="pb-4">
                                <p class="text-xs dark:text-gray-300 leading-tight">
                                    <span class="font-black text-gray-900 dark:text-white uppercase text-[10px]">{{ $log->user_name }}</span> 
                                    <span class="text-gray-500">{{ $log->description }}</span>
                                </p>
                                <p class="text-[9px] font-bold text-gray-400 mt-1 uppercase tracking-tighter">{{ $log->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @empty
                        <p class="text-[10px] font-black text-gray-300 uppercase text-center py-10 tracking-[0.2em]">Silence Radio</p>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>