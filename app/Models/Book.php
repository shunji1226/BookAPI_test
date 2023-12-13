<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $primaryKey = 'isbn';
    protected $fillable = ['isbn', 'name', 'publishedAt', 'authorId', 'publisherId'];
    
    public $incrementing = false;
    protected $keyType = 'string';

    public function author()
    {
        return $this->belongsTo(Author::class, 'authorId', 'authorId');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisherId', 'publisherId');
    }
}
