<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProjectController extends Controller
{



    public function kaffe()
    {
        
        $client = new Client();

        $url = "https://dev.to/api/articles/me/published";

        // $params = [
        //     //If you have any Params Pass here
        // ];

        $headers = [
            'api-key' => 'k3Hy5qr73QhXrmHLXhpEh6CQ'
        ];

        $response = $client->request('GET', $url, [
            // 'json' => $params,
            'headers' => $headers,
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return response()->json($responseBody);
    }


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

    public function ApiSearch(Request $request){

       //since we are searching by name , its only ideal we get the name first

       $bookName = $request;

       return response()->json($bookName);
       // return $bookName;
    }

    
}
