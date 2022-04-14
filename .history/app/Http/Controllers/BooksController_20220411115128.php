<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;

class BooksController extends Controller
{
    
   
    public function store(StoreBookRequest $request, Book $book){
        $book = $book->create($request->toArray());
    }
}
