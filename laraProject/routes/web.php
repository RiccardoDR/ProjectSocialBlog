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

Route::get('/','Controller1@showHome')->name('home');

Auth::routes();

Route::get('/chi_siamo','Controller1@showChiSiamo')->name('chi_siamo');

Route::get('/profile', 'UserController@showProfile')->name('profile');

Route::get('/profile/modifica_profilo', 'UserController@showUserMod')->name('mostra_modifica_profilo');
        
Route::post('/profile/modifica', 'UserController@modificaProfilo')->name('modifica_profilo');

Route::get('/cerca', 'UserController@search')->name('cerca');

Route::post('/richiesta', 'AmiciController@request')->name('richiesta');

Route::post('/accetta_richiesta', 'AmiciController@accept_request')->name('accetta_richiesta');

Route::post('/cancella_richiesta', 'AmiciController@delete_request')->name('cancella_richiesta');

Route::post('/messaggi', 'MessaggiController@getMessage')->name('messaggi');

Route::get('/amici', 'AmiciController@getAmici')->name('amici');

Route::get('/amici_user/{id}', 'AmiciController@getAmiciUser')->name('amici_user');

Route::get('/profileUser/{id}', 'UserController@getProfileUser')->name('profileUser');

Route::get('/blogsPage', 'UserController@getBlogs')->name('blogsPage');

Route::get('/miei_blog', 'UserController@showMieiBlog')->name('miei_blog');

Route::view('/crea_blog', 'crea_blog')->name('crea_blog');

Route::post('/crea_blog', 'UserController@creaBlog')->name('crea_blog');

Route::get('/blog/{IDBlog}', 'PostController@getPosts')->name('blog');

Route::post('/crea_post/{IDBlog}', 'PostController@createPost')->name('crea_post');

Route::get('/elimina_amico/{id1}/{id2}', 'AmiciController@deleteFriend')->name('elimina_amico');

Route::get('/elimina_mioblog/{id}', 'UserController@elimina_mioblog')->name('elimina_mioblog');

Route::get('/tutti_blog', 'UserController@getBlogs')->name('tutti_blog');

Route::get('/utenti_iscritti', 'UserController@getAllUsers')->name('utenti_iscritti');

Route::get('/membri_staff', 'UserController@getAllStaff')->name('membri_staff');

Route::get('/rimuovi_staff/{id}', 'UserController@elimina_staff')->name('rimuovi_staff');

Route::view('/aggiungi_staff_view', 'aggiungi_staff_view')->name('aggiungi_staff_view');

Route::post('/aggiungi_staff', 'UserController@addStaff')->name('aggiungi_staff');

Route::get('/cancella_post', 'PostController@deletePost')->name('cancella_post');

Route::get('/rimuovi_post', 'PostController@removePost')->name('rimuovi_post');