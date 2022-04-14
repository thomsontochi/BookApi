<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    
   public function authorize($ability, $arguments = [])
   {
       return true;
   }


    public function rules(){
        return [
            'name' => 'required|string',
            'isbn' => 'required|string',
            'authors' => 'required|',
            'number_of_pages' => 'required|integer',
            'publisher' => 'required|string',
            'country' => 'required|string',
            'release_date' => 'required|date',
        ];
    }

    public function myValidate()
    {
        return [
            'name.required' => 'The name field is required',
            'isbn.required' => 'The isbn field is required',
            'authors.required' => 'The authors field is required',
            'number_of_pages.required' => 'The number_of_pages field is required',
            'publisher.required' => 'The publisher field is required',
            'country.required' => 'The country field is required',
            'release_date.required' => 'The release_date field is required',
        ];
    }
}
