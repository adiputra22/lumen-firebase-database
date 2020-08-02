<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ClubController extends Controller
{
    public function index(Request $request)
    {
        $client = new Client([
            'base_uri' => 'https://lumen-app-firebase123.firebaseio.com/',
        ]);

        try {
            $response = $client->request('GET', 'clubs.json');
            
            $result = json_decode($response->getBody()->getContents(), true);

            return $this->generateResponse($result);
        } catch (\Exception $e) {
            return $this->generateError($e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $client = new Client([
            'base_uri' => 'https://lumen-app-firebase.firebaseio.com/',
        ]);

        try {
            $response = $client->request('POST', 'clubs.json', [
                'json' => [
                    'name' => $request->input('name'),
                    'location' => $request->input('location'),
                    'fans' => $request->input('fans')
                ]
            ]);
            
            $result = json_decode($response->getBody()->getContents(), true);

            return $this->generateResponse($result);
        } catch (\Exception $e) {
            return $this->generateError($e->getMessage());
        }
    }
}
