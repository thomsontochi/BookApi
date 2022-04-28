<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    // for success
    public function respond($data, $message = null) {
        return ResponseBuilder::asSuccess()->withData($data)->withMessage($message)->build();
    }

    // for error 
    public function respondWithError($api_code, $http_code) {
        return ResponseBuilder::asError($api_code)->withHttpCode($http_code)->build();
    }

    //  incase of sucess

    
}

