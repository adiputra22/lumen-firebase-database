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

    private function generateResponse($response)
    {
        return json_decode($response->getBody()->getContents(), true);
    }

    public function gets()
    {
        return $this->generateResponse($this->client->request('GET', $this->table));
    }

    public function post(array $postData)
    {
        return $this->generateResponse($this->client->request('POST', $this->table, [
            'json' => $postData
        ]));
    }

    public function get(string $clubId)
    {
        return $this->generateResponse($this->client->request(
            'GET', 
            $this->table . '/' . $clubId . '.json'
        ));
    }

    public function update(string $clubId, array $postData)
    {
        $this->generateResponse($this->client->request(
            'PUT', 
            $this->table . '/' . $clubId . '.json',
            ['json' => $postData]
        ));
    }

    public function delete(string $clubId)
    {
        $this->generateResponse($this->client->request(
            'DELETE', 
            $this->table . '/' . $clubId . '.json'
        ));
    }
}