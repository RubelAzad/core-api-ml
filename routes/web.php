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

$router->group(['prefix' => 'api'], function () use ($router) {

    //user router start
    $router->post('/register', 'AuthController@register');
    $router->post('/login', 'AuthController@login');
    //user router end

    include ('admin/Modules.php');

    $router->group(['middleware' => 'auth'], function () use ($router) {
        $router->post('/logout', 'AuthController@logout');

        // subcription license router start

        $router->get('/ml', 'MhlController@getMlAll');
        $router->post('/ml', 'MhlController@mlStore');
        $router->put('/ml/{id}', 'MhlController@mlEdit');
        $router->patch('/ml/{id}', 'MhlController@mlUpdate');
        $router->delete('/ml/{id}', 'MhlController@mlDestroy');

        // subcription license router End

        // subcription module router start

        $router->get('/mhm', 'MhmController@getMhmAll');
        $router->post('/mhm', 'MhmController@mhmStore');
        $router->put('/mhm/{id}', 'MhmController@mhmEdit');
        $router->patch('/mhm/{id}', 'MhmController@mhmUpdate');
        $router->delete('/mhm/{id}', 'MhmController@mhmDestroy');

        // subcription license router End



    });


});
