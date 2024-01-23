<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index()
    {
        $query = Rating::with('book')
                        ->groupBy('book_id')
                        ->select('book_id', DB::raw('COUNT(book_id) as voter'))
                        ->having('voter', '>', 5)
                        ->orderBy('voter', 'DESC');

        $data['ratings'] = $query->paginate(10);

        return view('author.index', $data);
    }
}
