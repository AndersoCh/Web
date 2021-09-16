<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/clientes',[
    'uses' => 'ClienteController@index'
]);

$router->post('/clientes',[
    'uses' => 'ClienteController@store'
]);

$router->put('/clientes/{id}',[
    'uses' => 'ClienteController@update'
]);

$router->delete('/clientes/{id}',[
    'uses' => 'ClienteController@destroy'
]);

$router->get('/heroes',[
    'uses' => 'HeroeController@index'
]);

$router->post('/heroes',[
    'uses' => 'HeroeController@store'
]);

$router->delete('/heroes/{id}',[
    'uses' => 'HeroeController@destroy'
]);