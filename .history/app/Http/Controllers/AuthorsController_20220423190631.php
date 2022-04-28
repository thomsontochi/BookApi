<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    protected $apiResponse

    public function __construct()
    {
        
    }(
        ApiResponse $apiResponse
    )
    {
        $this->apiResponse = $apiResponse;
    }

    public function externalBook(Request $request){
      //getting book name
      $bookName = $request->name;
      //checking if the book was supplied
      if (empty($bookName)) return $this->apiResponse->respondWithError('Invalid Book name supplied');
       //finding the book
       $bookCollection = $this->bookRepository->findBookByName($bookName);

       return $bookCollection;


    }
}
