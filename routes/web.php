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

$router->group(['prefix' => 'jenis-event'], function () use($router) {
    $router->get('/', 'JenisEventController@index');
    $router->post('/add', 'JenisEventController@store');
    $router->get('/edit/{id}', 'JenisEventController@edit');
    $router->put('/update/{id}', 'JenisEventController@update');
    $router->delete('/delete', 'JenisEventController@destroy');
});

