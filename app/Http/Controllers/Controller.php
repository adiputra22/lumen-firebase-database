<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Response;

class Controller extends BaseController
{
    protected function generateResponse(array $results, $defaultStatusCode=200)
    {
        $responseSuccess = [
            'status' => 'success',
            'statusCode' => $defaultStatusCode,
            'data' => $results
        ];

        return (new Response($responseSuccess, $defaultStatusCode))
            ->header('Content-Type', 'application/json');
    }

    protected function generateError($messages, $defaultStatusCode=500)
    {
        $responseError = [
            'status' => 'failed',
            'statusCode' => $defaultStatusCode,
            'message' => $messages
        ];

        return (new Response($responseError, $defaultStatusCode))
            ->header('Content-Type', 'application/json');
    }
}
