<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('recover', 'AuthController@recover');
Route::get('index','AuthController@index');

//rutas para manejo de arboles, etc
Route::get('/idProyecto/{id}','TreesController@idProyecto');


Route::resource('/users','AuthController');
Route::resource('/projects', 'ProjectsController');
Route::resource('/trees','TreesController');

//
Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'AuthController@logout');
    
    Route::get('test', function(){
        return response()->json(['foo'=>'bar']);
    });

});

