<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

use App\Http\Resources\BookResource;
use App\Http\Repository\BookRepository;
use App\Http\Requests\StoreBookRequest;
use App\Http\Library\RestFullResponse\ApiResponse;

class BooksController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }
    protected $bookRepository;
    protected $apiResponse;
    protected $bookResource;

    public function __construct(
        BookRepository $bookRepository,
        ApiResponse $apiResponse,
        BookResource $bookResource

    )
    {
        $this->bookRepository = $bookRepository;
        $this->apiResponse = $apiResponse;
        $this->bookResource = $bookResource;
    }

    
    public function index(Request $request){
        dd('helo');
       
        
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




}