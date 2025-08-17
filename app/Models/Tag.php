<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    
    protected $fillable = ['name', 'slug'];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function posts()
{
    return $this->belongsToMany(Post::class);
}
}
