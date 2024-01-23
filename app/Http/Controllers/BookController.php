<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Rating::with('book',)
                        ->groupBy('book_id')
                        ->select('book_id', DB::raw('AVG(rating) as average_rating'), DB::raw('COUNT(book_id) as voter'))
                        ->orderBy('voter', 'DESC');
        
        if ($request->search) {
            $searchTerm = $request->search;
        
            $query->whereHas('book', function ($subquery) use ($searchTerm) {
                $subquery->where('book_title', 'like', '%' . $searchTerm . '%');
            })->orWhereHas('book.author', function ($subquery) use ($searchTerm) {
                $subquery->where('author_name', 'like', '%' . $searchTerm . '%');
            });
        }

        $perPage = $request->shown ?? 10;
                        
        $data['ratings'] = $query->paginate($perPage);
        $data['shown'] = [10, 25, 50, 100];

        return view('books.index', $data);
    }

    public function filter(Request $request)
    {
        $shown = $request->shown;
        $search = $request->search;

        return redirect()->route('books.index', compact('shown', 'search'));
    }
}
