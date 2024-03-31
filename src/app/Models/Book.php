<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description'
    ];

    public function authors()
    {
        return $this->belongsToMany(
            Author::class,
            'book_author',
            'book_id',
            'author_id'
        );
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
