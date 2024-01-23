<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function create()
    {
        $data['authors'] = Author::get();

        return view('rating.form', $data);
    }

    public function store(Request $request)
    {
        try {
            Rating::create([
                'book_id'           => $request->book_id,
                'rating'            => $request->rating,
            ]);

            return redirect()->route('books.index')->with('success', 'Data saved successfully!');
        } catch (\Throwable $th) {
            return back()->with('danger', $th->getMessage());
        }
    }

    public function filterBooks(Request $request)
    {
        $authorId = $request->author_id;

        $books = Book::where('author_id', $authorId)->get();

        return response()->json($books);
    }
}
