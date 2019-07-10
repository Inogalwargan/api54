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
//Outlet
$router->get('/outlet', 'c_outlet@index');
$router->post('/outlet/store', 'c_outlet@store2');
$router->get('/outlet/show/{id}', 'c_outlet@show');
$router->post('/outlet/update/{id}', 'c_outlet@update');
$router->post('/outlet/destroy/{id}', 'c_outlet@destroy');

//Customers
$router->get('/customers', 'c_customers@index');
$router->post('/customers/store', 'c_customers@store');
$router->get('/customers/show/{id}', 'c_customers@show');
$router->post('/customers/update/{id}', 'c_customers@update');
$router->post('/customers/destroy/{id}', 'c_customers@destroy');
$router->get('/getIDkurir/', 'c_customers@getIDkurir');

//Tipe Laundry
$router->get('/tipelaundry', 'c_tipe_laundry@index');
$router->post('/tipelaundry/store', 'c_tipe_laundry@store');
$router->get('/tipelaundry/show/{id}', 'c_tipe_laundry@show');
$router->post('/tipelaundry/update/{id}', 'c_tipe_laundry@update');
$router->post('/tipelaundry/destroy/{id}', 'c_tipe_laundry@destroy');

//Harga Laundry (Finance)
$router->get('/hargalaundry/{id}', 'c_harga_laundry@index');
$router->post('/hargalaundry/store', 'c_harga_laundry@store');
$router->get('/hargalaundry/show/{id}', 'c_harga_laundry@show');
$router->post('/hargalaundry/update/{id}', 'c_harga_laundry@update');
$router->post('/hargalaundry/destroy/{id}', 'c_harga_laundry@destroy');

//Pengeluaran (Finance)
$router->get('/pengeluaran', 'c_pengeluaran@index');
$router->post('/pengeluaran/store', 'c_pengeluaran@store');
$router->get('/pengeluaran/show/{id}', 'c_pengeluaran@show');
$router->post('/pengeluaran/update/{id}', 'c_pengeluaran@update');
$router->post('/pengeluaran/destroy/{id}', 'c_pengeluaran@destroy');
