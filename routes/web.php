<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminPostController;


Route::get('/',[\App\Http\Controllers\PostController::class, 'index'])->name('home');
Route::get('/tags/{tag:slug}', function (\App\Models\Tag $tag) {
    $posts = $tag->posts()->where('is_published', true)->latest()->get();
    return view('posts.index', compact('posts'));
})->name('tags.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/api/search', function () {
    $q = request('q');
    $posts = \App\Models\Post::query()
        ->where('is_published', true)
        ->where(function ($query) use ($q) {
            $query->where('title', 'LIKE', "%{$q}%")
                  ->orWhere('excerpt', 'LIKE', "%{$q}%");
        })
        ->limit(8)
        ->get(['slug', 'title']);

    return $posts;
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('posts', AdminPostController::class);
});

Route::resource('posts', \App\Http\Controllers\PostController::class)
    ->only(['index', 'show'])
    ->parameters(['posts' => 'slug']);

require __DIR__.'/auth.php';
