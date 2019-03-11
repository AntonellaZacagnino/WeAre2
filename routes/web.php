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

//home

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index');

Route::get('/home', 'HomeController@listadoPost')->middleware('auth');


//miPerfil

Route::get('/{username}', 'ProfileController@show');

Route::get('/miPerfil', 'UserController@detalle')->middleware('auth');

Route::post("/miPerfil", "UserController@editar")->middleware("auth");

Route::post("/miPerfil", "UserController@almacenarDatos")->middleware("auth");

Route::get('edit_profile', 'UserController@editProfile')->name('profile.edit');

Route::post('update_profile_picture', 'ProfileController@updateProfilePicture')->name('profile.update.picture');


//usuario

Route::get('/usuario/{id}', 'UserController@listaPost')->middleware('auth');

Route::get("/usuario/{id}", "UserController@verPerfil")->name('username');

Route::get("/search", "homeController@search");

//followers

Route::group(['middleware' => 'auth'], function () {
    Route::get('/follows/{user}', 'UserController@follows');
    Route::get('/unfollows/{user}', 'UserController@unfollows');
});
Route::get('/{user}', 'ProfileController@show');
Route::get('/{user}/followers', 'ProfileController@followers');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/following', 'ProfileController@following');
    Route::post('/follows', 'UserController@follows');
    Route::post('/unfollows', 'UserController@unfollows');
});


Route::get("/follows", "followerController@listadoFollowers");

Route::get("/following", "followedController@listadoFollowing");


//mensajería

Route::get("/agregarmessage", "messagesController@agregarMensaje")->middleware("auth");

Route::post("/agregarmessage", "messagesController@almacenarMensaje")->middleware("auth");


//Posteo

Route::post("/agregarPosteo", "PostController@agregarPosteo")->middleware("auth");

Route::post("/miPerfil", "PostController@almacenarPosteo")->middleware("auth");

Route::post("/eliminarPosteo", "PostController@eliminarPosteo")->middleware("auth");


//Photos Post

Route::post("upload_photo", "postController@uploadPhoto")->name("posts.store");

Route::post('upload_photo', 'PostsController@uploadPhoto')->name('posts.store');
