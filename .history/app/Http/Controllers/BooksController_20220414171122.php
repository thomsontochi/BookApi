<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\v1\Books\ExternalBookResourceCollection;

class BooksController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }
    
    public function externalBook(Request $request)
    {
        // $res = Http::get('https://www.anapioficeandfire.com/api/books');
        // $data = json_decode($res->getBody()->getContents(), true);

        // return response()->json($data);

        
        $bookName = $request->name;
        
        if (empty($bookName)) return response()->json('Invalid Book name supplied');

        $bookCollection = $this->findBookByName($bookName);

        if (is_string($bookCollection)) return response()->json('Error fetching the book from the api');
        
        //return response(['data' => BookResource::collection($bookCollection), 'message' => 'Retrieved successfully'], 200);

        return (new ExternalBookResourceCollection($bookCollection));
    }




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
    
    public function show($id){
        $book = Book::where('id',$id)->first();

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        } 

        return response([
            new BookResource($book), 
        ], 200);
     
        
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

    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json([
            'data' => [
                "status_code" => 204,
                "status" => "success",
                "message" => "The book ‘My first book’ was deleted successfully",
                "data" => []
            ]
        ]);
    }


    public function findBookByName($name)
    {
        $query = self::filterInput($name);
       
        $books = $this->getFilteredBooks('name', $name);

        if (is_string($books)) return $books;

        return $books;
    }

    public function filterInput($query)
    {
        return str_replace('"', '', $query);
    }

    public function getFilteredBooks($params, $query)
    {
        return $this->getWithFilter("books?$params=$query");
    }

    public function getWithFilter($params)
    {
        try {
            return Http::get('https://www.anapioficeandfire.com/api/');
        } catch (\Exception $e) {
            return 'error getting book from external source';
        }
    }



}