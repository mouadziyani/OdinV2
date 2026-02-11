<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200">
                Odin Control Panel
            </h2>

            <span class="text-xs px-3 py-1 bg-blue-100 text-blue-800 rounded-full font-bold">
                Rôle : {{ auth()->user()->roles->first()->name ?? 'Abonné' }}
            </span>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 dark:bg-gray-900 min-h-screen">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4">

                <form method="GET" action="" class="flex flex-col md:flex-row gap-3">

                    <!-- Search -->
                    <input
                        type="text"
                        name="search"
                        placeholder="Search users, links, categories..."
                        value="{{ request('search') }}"
                        class="flex-1 rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white focus:ring focus:ring-blue-200"
                    >

                    <!-- Role filter -->
                    <select name="role" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white">
                        <option value="">All Roles</option>
                        <option value="admin">Admin</option>
                        <option value="editor">Editor</option>
                        <option value="user">User</option>
                    </select>

                    <!-- Category filter -->
                    <select name="category" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white">
                        <option value="">All Categories</option>
                        
                            <option value=""></option>

                    </select>

                    <button class="bg-blue-600 text-white px-5 rounded-lg hover:bg-blue-700">
                        Search
                    </button>
                </form>

            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5">

                {{-- Admins --}}
                <a href=""
                   class="dashboard-card border-red-500">
                    <x-slot name="color">red</x-slot>
                    <p class="title">Admins</p>
                    <p class="number">
                        
                    </p>
                </a>

                {{-- Users --}}
                <a href=""
                   class="dashboard-card border-blue-500">
                    <p class="title">Users</p>
                    <p class="number"></p>
                </a>

                {{-- Categories --}}
                <a href=""
                   class="dashboard-card border-purple-500">
                    <p class="title">Categories</p>
                    <p class="number"></p>
                </a>

                {{-- Links --}}
                <a href="{{ route('links.index') }}"
                   class="dashboard-card border-green-500">
                    <p class="title">Links</p>
                    <p class="number"></p>
                </a>

                {{-- Shares --}}
                <div class="dashboard-card border-yellow-500 cursor-default">
                    <p class="title">Shares</p>
                    <p class="number"></p>
                </div>

            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">

                <div class="p-5 border-b dark:border-gray-700 font-bold">
                    Recent Links
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-xs uppercase">
                        <tr>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Category</th>
                            <th class="px-4 py-2">Owner</th>
                            <th class="px-4 py-2">Date</th>
                        </tr>
                        </thead>

                        <tbody class="divide-y dark:divide-gray-700">
                        @foreach(\App\Models\Link::latest()->take(5)->get() as $link)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-900">
                                <td class="px-4 py-3 font-semibold">{{ $link->title }}</td>
                                <td class="px-4 py-3">{{ $link->category->name ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $link->user->name }}</td>
                                <td class="px-4 py-3 text-gray-400 text-xs">{{ $link->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
