<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Article Site</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans leading-relaxed">
    <!-- Top navigation -->
    <header class="bg-white shadow-sm sticky top-0 z-20">
        <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="/" class="text-2xl font-bold text-indigo-600">NewsPortal</a>
            <nav class="space-x-6 hidden md:flex text-slate-600">
                <a href="#" class="hover:text-indigo-600">Home</a>
                <a href="#" class="hover:text-indigo-600">World</a>
                <a href="#" class="hover:text-indigo-600">Business</a>
                <a href="#" class="hover:text-indigo-600">Tech</a>
                <a href="#" class="hover:text-indigo-600">Sports</a>
            </nav>
        </div>
    </header>

    <!-- Main content -->
    <main class="max-w-6xl mx-auto px-4 py-10 grid lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <h1 class="text-4xl font-extrabold mb-6 tracking-tight">Latest Articles</h1>

            <!-- Search -->
            <div x-data="{ q:'', results:[], searching:false }"
                 @keyup.debounce.300ms="if (q.length > 1) {
                     searching = true;
                     fetch('/api/search?q=' + encodeURIComponent(q))
                         .then(r => r.json())
                         .then(r => { results = r; searching = false });
                 } else { results = [] }"
                 class="mb-8 relative">
                <input x-model="q" type="text" placeholder="Search articles…"
                       class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 shadow-sm">

                <!-- dropdown -->
                <ul x-show="results.length" @click.away="results=[]"
                    class="absolute z-10 w-full bg-white border rounded-md shadow-lg mt-1 divide-y">
                    <template x-for="post in results" :key="post.slug">
                        <li>
                            <a :href="'/posts/' + post.slug"
                               class="block px-4 py-2 hover:bg-indigo-50 transition-colors"
                               x-text="post.title"></a>
                        </li>
                    </template>
                </ul>

                <span x-show="searching" class="absolute right-3 top-2 text-sm text-gray-400">Searching...</span>
            </div>

            <!-- Articles -->
            @forelse ($posts as $post)
                <article class="mb-10 border-b pb-6">
                    <h2 class="text-2xl font-semibold mb-1">
                        <a href="{{ route('posts.show', $post->slug) }}" class="hover:text-indigo-600">
                            {{ $post->title }}
                        </a>
                    </h2>
                    <p class="text-sm text-slate-500 mb-2">
                        Published {{ $post->published_at->diffForHumans() }}
                    </p>
                    <p class="text-slate-700">{{ $post->excerpt }}</p>
                </article>
            @empty
                <p class="text-slate-500">No articles yet. Stay tuned!</p>
            @endforelse
        </div>

        <!-- Sidebar -->
        <aside class="hidden lg:block">
            <div class="bg-white rounded-lg shadow-sm p-5 sticky top-24">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Trending</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="block text-indigo-600 hover:underline">Major Tech Merger Announced</a></li>
                    <li><a href="#" class="block text-indigo-600 hover:underline">Global Markets React to Policy Shift</a></li>
                    <li><a href="#" class="block text-indigo-600 hover:underline">Breakthrough in Renewable Energy</a></li>
                    <li><a href="#" class="block text-indigo-600 hover:underline">Championship Finals: Who Will Win?</a></li>
                </ul>
            </div>
        </aside>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-100 mt-10 border-t">
        <div class="max-w-6xl mx-auto px-4 py-6 text-center text-sm text-slate-500">
            © {{ date('Y') }} NewsPortal. All rights reserved.
        </div>
    </footer>
</body>
</html>
