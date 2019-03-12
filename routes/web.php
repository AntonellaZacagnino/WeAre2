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

 // ----------------------------------- Home --------------------------------------------------------
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/feed', 'FeedsController@newsFeed');
    });

 // --------------------------- Perfil de usuario logueado -------------------------------------------

Route::get('/miPerfil', 'UserController@detalle')->middleware('auth');

Route::get('miPerfil', 'UserController@editarPerfil')->name('miPerfil.editar');

Route::post('actualizar_perfil', 'UserController@actualizarPerfil')->name('miPerfil.actualizar');

Route::post('subir_foto_perfil', 'UserController@actualizarFotoPerfil')->name('miPerfil.actualizar.foto');


 // ---------------------------- Perfil de usuario ------------------------------------------------------

Route::get("/usuario/{id}", "UserController@verPerfil")->name('user');


// -------------------------------------------- Posteos --------------------------------------------------

Route::post("/agregarPosteo", "PostController@agregarPosteo")->middleware("auth");

Route::post("/miPerfil", "PostController@almacenarPosteo")->middleware("auth");

Route::post("/eliminarPosteo", "PostController@eliminarPosteo")->middleware("auth");

 // ------------------------------------------------ Mensajes ----------------------------------------------

Route::get("/agregarmessage", "messagesController@agregar")->middleware("auth");

Route::post("/agregarmessage", "messagesController@almacenar")->middleware("auth");

 // ---------------------------------------------------Followers---------------------------------------------

 Route::group(['middleware' => ['auth']], function () {

     Route::post('/follow/{user}', 'FollowController@follow');
     Route::delete('/unfollow/{user}', 'FollowController@unfollow');
 });
