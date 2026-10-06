{{-- MASTER LAYOUT: every page extends this file with @extends('layouts.master') --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- HEAD: page settings, title and CSS/JS libraries --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Each page can set its own title with @section('title', '...'); default is the app name --}}
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    {{-- Tailwind CSS (for styling) --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="flex min-h-screen flex-col">

    {{-- HEADER / NAVIGATION: top menu shown on every page --}}
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                {{-- Left side: logo + menu links --}}
                <div class="flex items-center">
                <div class="flex shrink-0 items-center py-2">
                    <img src="https://azmdigital.sa/images/logo-w.png" alt="Your Company" class="h-8 w-auto" />
                </div>

                {{-- Menu links (__('local.xxx') gets the translated text from lang/en|ar/local.php) --}}
                <div class="ml-6 flex space-x-4">
                    <a href="/" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">{{ __('local.home') }}</a>
                    <a href="{{ route('product.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">{{ __('local.task') }}</a>
                    <a href="{{ route('tasksRouteName') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">{{ __('local.projects') }}</a>
                </div>
                </div>

                {{-- Right side: language switcher --}}
                <div class="flex space-x-2">
                    <a href="/setlang/en" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">EN</a>
                    <a href="/setlang/ar" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Ar</a>
                </div>
            </div>
        </div>
    </nav>

    {{-- MAIN CONTENT: the unique part of each page is inserted here --}}
    <main class="mx-auto w-full max-w-7xl flex-1 p-4">
        @yield('content')
    </main>

    {{-- FOOTER: bottom section shown on every page --}}
    <footer class="bg-gray-800 py-4 text-center text-sm text-gray-300">
        &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
    </footer>

</body>
</html>
