<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
   <title>{{ $post->title }} – Article Site</title>
<meta name="description" content="{{ Str::limit(strip_tags($post->excerpt ?? $post->body), 150) }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans">
    <div class="max-w-3xl mx-auto px-4 py-12">
        <a href="{{ route('home') }}" class="text-indigo-600 hover:underline">&larr; Back to all articles</a>

        <article class="mt-8 prose prose-slate lg:prose-lg mx-auto">
            <h1>{{ $post->title }}</h1>

            <p class="text-sm text-slate-500 not-prose">
                Published {{ $post->published_at->diffForHumans() }}
            </p>

            {!! Str::markdown($post->body) !!}
        </article>
    </div>
</body>
</html>
