<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
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

    public function __construct(
        BookRepository $bookRepository,
        ApiResponse $apiResponse,
        
    )
    {
        $this->bookRepository = $bookRepository;
        $this->apiResponse = $apiResponse;
    }

    
    public function index(Request $request){
        if ($request->all()) {
            $books = $this->bookRepository->searchBookTable($request->all());
            if (is_string($books)) return $this->apiResponse->respondWithError($books);
        } else {
            $books = $this->bookRepository->getAllBooks();
        }
        return $this->apiResponse->respondWithDataStatusAndCodeOnly(
            $this->bookResource->transformCollection($books->toArray()), JsonResponse::HTTP_OK);
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