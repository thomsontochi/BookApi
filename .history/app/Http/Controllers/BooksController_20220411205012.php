<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use App\Http\Requests\StoreBookRequest;

class BooksController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function index(){

    }
   
    public function store(StoreBookRequest $request, Book $book){
        try
        $book = $book->create($request->toArray());
        return response()->json([
            'data' => new BookResource($book)
        ],201);
        
    }
}
