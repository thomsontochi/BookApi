<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function store(StoreBookRequest $request, Book $book){
        //return response()->json($request);
        $book = $book->create($request->toArray());
        return $book;
    }
}
