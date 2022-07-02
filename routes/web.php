<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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
    return 'api';
});

$router->post('/agregar-vendedor', function (Request $request) use ($router){
    DB::table('/agregar-vendedor')->insert([
        'nombre' => $request->post('nombre'),
        'apellidos' => $request->post('apellidos'),
        'cedula'    => $request->post('cedula')
    ]);
});

$router->post('/vendedor/{id}', function ($id) use ($router){
    $vendedor = DB::table('vendedor')->where('id', $id)->first();

    if($vendedor == null){
        return http_response_code(403);
    }
    return json_encode($vendedor);
});