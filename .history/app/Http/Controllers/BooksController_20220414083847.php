<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BooksController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }
    
    
    public function index(Request $request){
        
        $book = Book::all();
        return response(['data' => BookResource::collection($book), 'message' => 'Retrieved successfully'], 200);

        $result = Book::where('name', 'LIKE', '%'. $name. '%')->get();
            if(count($result)){
             return Response()->json($result);
            }
            else {
                return response()->json([
                    'data' => [
                        'status_code' => 200,
                        'status' => 'success',
                        'data' => []
                    ]
                ], 404);
            }
       $book = Book::all();
       return response(['data' => BookResource::collection($book), 'message' => 'Retrieved successfully'], 200);
    }
    
        
    
   
    public function store(StoreBookRequest $request, Book $book){
        
            try{
                $book = $book->create($request->toArray());
                return response()->json([
                    'data' => new BookResource($book)
                ],201);
            }
            catch (\Exception $e){
                $payload=[
                    'status'=>'fail',
                    'details'=>$e->getMessage()
                ];
                return response()->json(
                    ['message' => $payload]
                );
    
             }
    }

    public function update(UpdateBookRequest $request, Book $book){
        $book->update($request->all());

        return response(['book' => new BookResource($book), 'message' => 'The Book , My first book Was updated suceesfully'], 200);
    }

    public function delete(){
        
    }




}