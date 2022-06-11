<?php

namespace App\Forum\Domain\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
    ];

    public static function boot()
    {
        parent::boot();
        static::created(function($topic) {
            $topic->update([
                'slug' => Str::slug($topic->id . ' ' . $topic->title) 
            ]);
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
