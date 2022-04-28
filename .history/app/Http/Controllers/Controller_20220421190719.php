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



    public function respond($data, $msg = null) {
        return ResponseBuilder::asSuccess()->withData($data)->withMessage($msg)->build();
    }

    
}

