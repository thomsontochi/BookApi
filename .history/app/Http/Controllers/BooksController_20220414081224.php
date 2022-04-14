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
    
    
    public function index(Request $request){
        
        $book = Book::all();
        return response(['data' => BookResource::collection($book), 'message' => 'Retrieved successfully'], 200);

        $result = Book::where('name', 'LIKE', '%'. $name. '%')->get();
            if(count($result)){
             return Response()->json($result);
            }
            else {
                return response()->json(['data' => 'No Data not found'], 404);
            }
       $book = Book::all();
       return response(['data' => BookResource::collection($book), 'message' => 'Retrieved successfully'], 200);
    }
    return response()->json([
        'data' => [
            'client'        => new ClientResource($client),
            'forms'         => FormControllerResource::collection($forms),
            'job_roles'     => $job_roles,
            'job_levels'    => $job_levels,
            'credentials'   => $credentials,
            'client_managers' => $managers
        ]
    ]);
        
    
   
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




}