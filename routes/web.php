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

$router->group(['middleware' => 'gateway.auth'], function () use ($router) {
// API GATEWAY ROUTES FOR SITE1 USERS
    $router->get('/users1', 'User1Controller@index');
    $router->get('/users1/{id}', 'User1Controller@show');
    $router->post('/users1', 'User1Controller@add');
    $router->put('/users1/{id}', 'User1Controller@update');
    $router->delete('/users1/{id}', 'User1Controller@delete');

// API GATEWAY ROUTES FOR SITE2 USERS
    $router->get('/users2', 'User2Controller@index');
    $router->get('/users2/{id}', 'User2Controller@show');
    $router->post('/users2', 'User2Controller@add');
    $router->put('/users2/{id}', 'User2Controller@update');
    $router->delete('/users2/{id}', 'User2Controller@delete');
});

$router->group(['middleware' => 'auth'], function () use ($router) {
    // Define your protected routes here
    $router->get('/users/me', 'UserController@me');
});