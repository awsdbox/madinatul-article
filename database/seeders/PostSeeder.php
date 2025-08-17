<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Post::create([
        'title' => 'Hello Laravel Articles',
        'slug'  => 'hello-laravel-articles',
        'excerpt' => 'Our very first post to check everything works.',
        'body' => "## It works!\n\nTailwind + Laravel is alive.",
        'is_published' => true,
        'published_at' => now(),
    ]);
    }
}
