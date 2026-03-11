<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Odin') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased h-full">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#f8fafc] dark:bg-gray-950 relative overflow-hidden">
            
            <div class="absolute top-0 -left-4 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob"></div>
            <div class="absolute bottom-0 -right-4 w-72 h-72 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-2000"></div>


            <div class="w-full sm:max-w-md mt-8 px-8 py-10 bg-white/80 dark:bg-gray-900/80 backdrop-blur-xl border border-white dark:border-gray-800 shadow-2xl shadow-blue-500/5 overflow-hidden sm:rounded-[2.5rem] z-10">
                <div class="mb-8 text-center">
                    <h2 class="text-2xl font-black text-gray-900 dark:text-white uppercase tracking-tighter">Odin <span class="text-blue-600">Portal</span></h2>
                    <p class="text-xs text-gray-400 mt-1 uppercase font-bold tracking-widest italic">Authentification Sécurisée</p>
                </div>

                {{ $slot }}
            </div>

            <p class="mt-8 text-center text-xs text-gray-400 font-medium z-10 tracking-widest uppercase opacity-50">
                &copy; {{ date('2026') }} Odin - All Rights Reserved
            </p>
        </div>
    </body>
</html>