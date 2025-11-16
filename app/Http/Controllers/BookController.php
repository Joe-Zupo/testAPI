<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();

        // Filtering
        if ($request->has('title')) {
            $query->where('title', 'like', "%" . $request->title . "%");
        }

        if ($request->has('author')) {
            $query->where('author', 'like', "%" . $request->author . "%");
        }

        if ($request->has('year')) {
            $query->where('year', $request->year);
        }

        // Sorting
        if ($request->has('sort')) {
            $query->orderBy($request->sort, 'asc');
        }

        // Execute
        $book = $query->get();
        if($book->isEmpty()){
            return response()->json(['message' => 'No Books Found'], 404);
        }
        return BookResource::collection($book);
    }

    public function show($id)
    {
        $book = Book::find($id);
        if(!$book){
            return response()->json(['message' => 'No Book Found'], 404);
        }
        return new BookResource($book);
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|digits:4'
        ]);

        if($validated->fails()){
            return response()->json([
                'message' => 'Fields have wrong input!',
                'error' => $validated->messages(),
            ], 422);
        }
        $book = Book::create($validated->validated());
        return response()->json([
            'message' => 'Book Created Successfuly',
            'data' => new BookResource($book->fresh())
        ], 201);
    }

    public function update(Request $request, $id)
    {
        //Validated Object
        $validated = Validator::make($request->all(),[
            'title' => 'sometimes|string|max:255',
            'author' => 'sometimes|string|max:255',
            'year' => 'sometimes|digits:4'
        ]);

        //VALIDATION
        if($validated->fails()){
            return response()->json([
                'message' => 'Fields have wrong input!',
                'error' => $validated->messages(),
            ], 422);
        }
        $book = Book::find($id);
        if(!$book){
            return response()->json(['message' => 'No Book Found'], 404);
        }

        //assign array data to variable
        $book->update($validated->validated());
        return response()->json([
            'message' => 'Product updated successfully!',
            'data' => new BookResource($book)
        ], 200);
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if(!$book){
            return response()->json(['message' => 'No Book Found'], 404);
        }
        $book->delete();
        return response()->json([
            'message' => 'Book Deleted',
            'data' => new BookResource($book)
        ], 200);
    }
}

