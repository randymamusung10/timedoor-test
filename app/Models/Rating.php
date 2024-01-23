<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    use HasFactory;
    protected $table    = 'rating';
    protected $guarded  = [];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
