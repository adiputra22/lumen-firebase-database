<?php

namespace App\Http\Controllers;

use App\Core\AppHttpClient\AppFirebaseClient;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index(Request $request)
    {
        $client = new AppFirebaseClient('clubs.json');

        try {
            $result = $client->gets();

            return $this->generateResponse($result);
        } catch (\Exception $e) {
            return $this->generateError($e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $client = new AppFirebaseClient('clubs.json');

        try {
            $result = $client->post([
                'name' => $request->input('name'),
                'location' => $request->input('location'),
                'fans' => $request->input('fans')
            ]);

            return $this->generateResponse($result);
        } catch (\Exception $e) {
            return $this->generateError($e->getMessage());
        }
    }
}
