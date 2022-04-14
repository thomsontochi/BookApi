<?php 

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use App\Http\Controllers\Controller;
use Response;


class ApiResponse extends Controller
{
    
}






public function respondWithError($message)
    {
        return $this->respond([
            'error' => $message
        ]);

    }