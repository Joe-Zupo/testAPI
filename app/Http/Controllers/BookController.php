<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $book = Book::all();
        if($book->isEmpty()){
            return response()->json(['message => No Books Found'], 404);
        }
        return response()->json($book, 200);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return response()->json($book, 200);
    }

    public function store()
    {
        $validated = request()->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|digits:4'
        ]);

        $book = Book::create($validated);
        return response()->json($book, 201);
    }

    public function update($id)
    {
        $validated = request()->validate([
            'title' => 'sometimes|string|max:255',
            'author' => 'sometimes|string|max:255',
            'year' => 'sometimes|integer|digits:4'
        ]);

        $book = Book::findOrFail($id);
        $book = Book::updated($validated);

        return response()->json($book, 200);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json(['message' => 'Book Deleted'], 200);
    }
}
