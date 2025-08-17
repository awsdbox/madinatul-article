<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::with('tags')->latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|min:3',
            'excerpt' => 'required|max:160',
            'body'    => 'required',
            'tags'    => 'nullable|string', // comma-separated
        ]);

        $post = Post::create([
            ...$validated,
            'slug'          => Str::slug($validated['title']),
            'is_published'  => (bool) $request->input('is_published', false),
            'published_at'  => $request->boolean('is_published') ? now() : null,
        ]);

        $tags = collect(explode(',', $request->input('tags', '')))
        ->map(fn ($t) => trim($t))
        ->filter()
        ->unique()
        ->map(fn ($t) => Tag::firstOrCreate(['slug' => Str::slug($t)], ['name' => $t]));

$post->tags()->sync($tags->pluck('id'));


        return redirect()->route('admin.posts.index')->with('success', 'Post created.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }public function update(Request $request, Post $post)
{
    $validated = $request->validate([
        'title'   => 'required|min:3',
        'excerpt' => 'required|max:160',
        'body'    => 'required',
        'tags'    => 'nullable|string', // comma-separated
    ]);

    $post->update([
        ...$validated,
        'slug'          => Str::slug($validated['title']),
        'is_published'  => (bool) $request->input('is_published', false),
        'published_at'  => $request->boolean('is_published') ? now() : null,
    ]);

 $tags = collect(explode(',', $request->input('tags', '')))
        ->map(fn ($t) => trim($t))
        ->filter()
        ->unique()
        ->map(fn ($t) => Tag::firstOrCreate(['slug' => Str::slug($t)], ['name' => $t]));

$post->tags()->sync($tags->pluck('id'));


    return redirect()
        ->route('admin.posts.index')
        ->with('success', 'Post updated.');
}


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted.');
    }
}
