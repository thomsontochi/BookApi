<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProjectController extends Controller
{



    
    public function apiWithoutKey()
    {
        $client = new Client(); //GuzzleHttp\Client
        $url = "https://api.github.com/users/kingsconsult/repos";
        // book api => https://www.anapioficeandfire.com/api/books

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return response()->json($responseBody);
    }

    
}
