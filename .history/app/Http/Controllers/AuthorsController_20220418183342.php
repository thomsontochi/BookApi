<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorsController extends Controller
{

    
    public function externalBook(Request $request){
      //getting book name
      $bookName = $request->name;
      //checking if the book was supplied
      if (empty($bookName)) return $this->apiResponse->respondWithError('Invalid Book name supplied');
    }
}
