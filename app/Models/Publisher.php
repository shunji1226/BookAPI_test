<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $primaryKey = 'publisherId';
    protected $fillable = ['name'];

    public function books()
    {
        return $this->hasMany(Book::class, 'publisherId', 'publisherId');
    }

    public function relatedAuthors()
    {
        return $this->hasManyThrough(Author::class, Book::class, 'publisherId', 'authorId', 'publisherId', 'authorId');
    }
}


