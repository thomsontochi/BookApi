<?php 

namespace App\Http\Repository;


class BookRepository {


    public function getBookByName($name){

        $query = self::filterInput($name);

        return response()->json
    }
}