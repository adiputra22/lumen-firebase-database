<?php

namespace App\Core\AppHttpClient;

use GuzzleHttp\Client;

class AppFirebaseClient 
{
    protected $client;

    protected $table;

    public function __construct(string $table)
    {
        $this->table = $table;

        $this->client = new Client([
            'base_uri' => env('FIREBASE_DATABASE_URI')
        ]);
    }

    public function gets()
    {
        $response = $this->client->request('GET', $this->table);
            
        return json_decode($response->getBody()->getContents(), true);
    }

    public function post(array $postData)
    {
        $response = $this->client->request('POST', $this->table, [
            'json' => $postData
        ]);
        
        return json_decode($response->getBody()->getContents(), true);
    }
}