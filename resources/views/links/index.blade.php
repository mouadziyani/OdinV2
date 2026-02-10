<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Links') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="mb-4">
                    <a href="{{ route('links.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Create New Link
                    </a>
                </div>

                @if(session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                @if($links->count())
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">URL</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Owner</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                            @foreach($links as $link)
                                <tr>
                                    <td class="px-6 py-4">{{ $link->title }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ $link->url }}" target="_blank" class="text-blue-500 hover:underline">
                                            {{ $link->url }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">{{ $link->user->name }}</td>
                                    <td class="px-6 py-4 space-x-2">
                                        <a href="{{ route('links.show', $link) }}" class="text-indigo-600 hover:underline">View</a>
                                        @can('update', $link)
                                            <a href="{{ route('links.edit', $link) }}" class="text-yellow-600 hover:underline">Edit</a>
                                        @endcan
                                        @can('delete', $link)
                                            <form action="{{ route('links.destroy', $link) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500">No links found.</p>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
