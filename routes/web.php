<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/clubs', [
    'as' => 'clubs.store', 
    'uses' => 'ClubController@store'
]);

$router->get('/clubs', [
    'as' => 'clubs.index', 
    'uses' => 'ClubController@index'
]);

$router->get('/clubs/{clubId}', [
    'as' => 'clubs.show', 
    'uses' => 'ClubController@show'
]);

$router->put('/clubs/{clubId}', [
    'as' => 'clubs.update', 
    'uses' => 'ClubController@update'
]);

$router->delete('/clubs/{clubId}', [
    'as' => 'clubs.destroy', 
    'uses' => 'ClubController@destroy'
]);
