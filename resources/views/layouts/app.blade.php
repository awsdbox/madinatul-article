<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="@yield('meta_description','')">
    @vite(['resources/css/app.css', 'resources/js/site.js'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased">
    <header class="bg-white border-b">
        <div class="max-w-5xl mx-auto px-4 py-4 flex items-center justify-between gap-4">
            <a href="{{ route('home') }}" class="text-2xl font-extrabold tracking-tight text-slate-900">
                {{ config('app.name', 'Article Site') }}
            </a>

            <nav class="hidden md:flex items-center gap-4 text-sm">
                <a href="{{ route('home') }}" class="hover:text-indigo-600">Home</a>
                <a href="#" class="hover:text-indigo-600">Topics</a>
                <a href="#" class="hover:text-indigo-600">About</a>
            </nav>

            <div class="flex items-center gap-3">
                <button id="toggle-theme" aria-label="Toggle dark mode"
                    class="hidden sm:inline-flex items-center gap-2 px-3 py-1.5 rounded-md text-sm bg-slate-100 hover:bg-slate-200">
                    <span id="theme-icon">🌙</span>
                    <span class="hidden sm:inline">Theme</span>
                </button>

                <button id="mobile-menu-button" class="md:hidden px-2 py-1 rounded-md bg-slate-100 hover:bg-slate-200">
                    ☰
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="md:hidden hidden border-t bg-white">
            <div class="px-4 py-2 space-y-2">
                <a href="{{ route('home') }}" class="block py-2">Home</a>
                <a href="#" class="block py-2">Topics</a>
                <a href="#" class="block py-2">About</a>
            </div>
        </div>
    </header>

    <main class="py-10">
        @yield('content')
    </main>

    <footer class="border-t bg-white">
        <div class="max-w-5xl mx-auto px-4 py-8 text-sm text-slate-600">
            <div class="flex flex-col md:flex-row md:justify-between gap-4">
                <div>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</div>
                <div class="flex gap-4">
                    <a href="#" class="hover:underline">Privacy</a>
                    <a href="#" class="hover:underline">Terms</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
