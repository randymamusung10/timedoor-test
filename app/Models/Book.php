<?php

namespace App\Models;

use App\Models\Rating;
use App\Models\BookCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $table    = 'books';
    protected $guarded  = [];

    public function category()
    {
        return $this->belongsTo(BookCategory::class, 'category_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'book_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}
