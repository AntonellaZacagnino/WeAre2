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


Route::get('/home', 'HomeController@listadoPost')->middleware('auth')->name('profile');
Route::get('/usuario/{id}', 'UserController@listadoPost')->middleware('auth');

//F & UF
Route::get("/seguidos", "followedController@listadofollower");
Route::get("/seguidos", "followedController@listadofollowed");

//perfil photos
Route::post("upload_photo", "postController@uploadPhoto")->name("posts.store");
Route::get('/home', 'HomeController@index');


Route::get('edit_profile', 'UserController@editProfile')->name('profile.edit');
Route::post('update_profile', 'ProfileController@updateProfile')->name('profile.update');

Route::post('update_profile_picture', 'ProfileController@updateProfilePicture')->name('profile.update.picture');

Route::post('upload_photo', 'PostsController@uploadPhoto')->name('posts.store');

/// seguidores


Route::post("/eliminarSeguidor", "followedController@eliminar")->middleware("auth");

Route::get("/agregarmessage", "messagesController@agregar")->middleware("auth");

Route::post("/agregarmessage", "messagesController@almacenar")->middleware("auth");

Route::get("/usuario/{user}", "UserController@verPerfil")->middleware("auth");

Route::post("/miPerfil", "UserController@editar")->middleware("auth");

Route::post("/miPerfil", "UserController@almacenarDatos")->middleware("auth");

Route::post("/agregarPosteo", "PostController@agregarPosteo")->middleware("auth");

Route::post("/miPerfil", "PostController@almacenarPosteo")->middleware("auth");

Route::post("/eliminarPosteo", "PostController@eliminarPosteo")->middleware("auth");
