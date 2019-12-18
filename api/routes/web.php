<?php
use Illuminate\Http\Response;
use \App\Product;
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

$router->get('/products', function () use ($router) {
    return response()->json(DB::select('select * from products'))
    ->header('Access-Control-Allow-Origin', '*');
});

$router->patch('/products/{id}', function ($id) use ($router) {
    $product = Product::where('id', $id)->first();
    if(!$product) {
        return response()->json(['message' => 'Product not found'], 404)->header('Access-Control-Allow-Origin', '*');
    }
    $product->update([
    'status' => 'approved']);

    return response()->json($product)
    ->header('Access-Control-Allow-Origin', '*')->header("Access-Control-Allow-Methods", "GET, POST, PATCH, OPTIONS");
});