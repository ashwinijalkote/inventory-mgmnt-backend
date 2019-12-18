<?php
use Illuminate\Http\Response;
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

$router->get('/users', function () use ($router) {
    return response()->json(DB::select('select * from users limit 1'))
    ->header('Access-Control-Allow-Origin', '*');
});

$router->get('/login', function () use ($router) {
    return response()->json(DB::select('select * from users limit 1'))
    ->header('Access-Control-Allow-Origin', '*');
});

$router->post(
    'auth/login',
    [
       'uses' => 'AuthController@authenticate'
    ]
);

$router->post('web/login', 'AuthController@login');