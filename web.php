<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/miPerfil', 'UserController@detalle')->middleware('auth');


Route::get("/seguidores", "followerController@listado");

Route::get("/seguidos", "followedController@listado");

Route::post("/eliminarSeguidor", "followedController@eliminar")->middleware("auth");

Route::get("/agregarmessage", "messagesController@agregar")->middleware("auth");

Route::post("/agregarmessage", "messagesController@almacenar")->middleware("auth");

Route::get("/usuario/{id}", "UserController@verPerfil")->middleware("auth");



Route::post("/agregarPosteo", "PostController@agregarPosteo")->middleware("auth");

Route::post("/miPerfil", "PostController@almacenarPosteo")->middleware("auth");

Route::post("/eliminarPosteo", "PostController@eliminarPosteo")->middleware("auth");
