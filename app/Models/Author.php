<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $primaryKey = 'authorId';
    protected $fillable = ['name'];

    public function books()
    {
        return $this->hasMany(Book::class, 'authorId', 'authorId');
    }

    public function relatedPublishers()
    {
        return $this->hasManyThrough(Publisher::class, Book::class, 'authorId', 'publisherId', 'authorId', 'publisherId');
    }
}


