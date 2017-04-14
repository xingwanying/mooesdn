<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/qunee', function () {
     $json = '{"nodes":[{"name": "VM1", "x": -100, "y": -50, "id": 1}, {"name": "VM2", "id": 2}], "edges": [{"name": "", "from":1, "to":2}]}';
        $data = json_decode($json, true);
        return $json;
});


