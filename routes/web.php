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

Route::get('users', 'HomeController@users')->name('users');

Route::get('user/{id}', 'HomeController@user')->name('user.view');

Route::post('ajaxRequest', 'HomeController@ajaxRequest')->name('ajaxRequest');

 // --------------------------- Perfil de usuario logueado -------------------------------------------

Route::get('/miPerfil', 'UserController@detalle')->middleware('auth');

Route::post("/miPerfil", "UserController@editar")->middleware("auth");

Route::post("/miPerfil", "UserController@almacenarDatos")->middleware("auth");

Route::post("upload_photo", "postController@uploadPhoto")->name("posts.store");

Route::get('edit_profile', 'UserController@editProfile')->name('profile.edit');

Route::post('update_profile', 'ProfileController@updateProfile')->name('profile.update');

Route::post('update_profile_picture', 'ProfileController@updateProfilePicture')->name('profile.update.picture');

Route::post('upload_photo', 'PostsController@uploadPhoto')->name('posts.store');

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
