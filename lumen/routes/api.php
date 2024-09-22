<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the API routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/version', function () use ($router) {
    return $router->app->version();
});

$router->get('/tasks', 'TaskController@index');
$router->post('/tasks', 'TaskController@store');
$router->get('/tasks/{id}', 'TaskController@show');
$router->put('/tasks/{id}', 'TaskController@update');
$router->delete('/tasks/{id}', 'TaskController@destroy');
