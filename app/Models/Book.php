<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $primaryKey = 'isbn';
    protected $fillable = ['name', 'publishedAt', 'authorId', 'publisherId'];
    
    public $incrementing = false;

    public function author()
    {
        return $this->belongsTo(Author::class, 'authorId', 'authorId');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisherId', 'publisherId');
    }
}


