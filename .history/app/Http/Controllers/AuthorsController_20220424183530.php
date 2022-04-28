<?php

namespace App\Http\Controllers;

use App\ApiCodeResponse\ApiCode;
use Illuminate\Http\Request;
use App\Http\RestFullResponse\ApiResponse;

class AuthorsController extends Controller
{
    protected $apiResponse;

    public function __construct(
        ApiResponse $apiResponse,
    )
    {
        $this->apiResponse = $apiResponse;
    }

    public function externalBook(Request $request){
      //getting book name
      $bookName = $request->name;
      //checking if the book was supplied
      if (empty($bookName)) return $this->respondWithError;
       //finding the book
       $bookCollection = $this->bookRepository->findBookByName($bookName);

       return $bookCollection;


    }
}
