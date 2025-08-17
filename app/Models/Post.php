<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'is_published',
        'published_at',
    ];
    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function tags()
{
    return $this->belongsToMany(Tag::class);
}

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                     ->whereNotNull('published_at')
                     ->where('published_at', '<=', now());
    }

    // Accessor to show tags in edit form
public function getTagListAttribute()
{
    return $this->tags->pluck('name')->join(', ');
}
}
