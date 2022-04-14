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
        try{

        }
        catch (\Exception $e){
            $payload=[
                'status'=>'fail',
                'details'=>$e->getMessage()
            ];
            return response()->json(['message' => $payload]);



       
        
    }
}
