<?php

use Illuminate\Support\Facades\Route;

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
})->name('/');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

    /*
        Routes de gestion des contacts
    */
Route::group(['prefix' => 'contact'], function(){

    Route::get('/contact/all', 'ContactController@index')->name('conatct.all');
    Route::post('/', 'ContactController@store')->name('store');
    Route::get('contact/{id}', 'ContactController@show')->name('contct.show');
    Route::post('/update{id}', 'ContactController@update')->name('udatecontact');
    Route::get('/destroy{id}', 'ContactController@destroy')->name('contact.destroy');
    Route::get('/edite{id}', 'ContactController@edit')->name('edite');
    Route::get('/{id}', 'ContactController@editfavoris')->name('editefavoris');

});

    /*
        Routes de gestion des groupe
    */
Route::group(['prefix' => 'groupe'], function(){

    Route::get('all', 'GroupeController@index')->name('groupe.all');
    Route::get('one/{id}', 'GroupeController@one')->name('groupe.one');
    Route::post('/', 'GroupeController@store')->name('groupeCreate');
    Route::get('/groupe/{id}', 'GroupeController@show')->name('show');
    Route::post('/{id}', 'GroupeController@update')->name('groupeupdate');
    Route::get('/destroy/{id}', 'GroupeController@destroy')->name('destroy');

});

/*
    Routes de gestion des contact faoris
*/
Route::group(['prefix' => 'favoris'], function(){

    Route::get('favoris/index', 'FavorisController@index')->name('favoris.index');

});

/*
    Routes pour la recherche
*/
Route::group(['prefix' => 'seach'], function(){

    Route::post('seach/index', 'SeachController@index')->name('seach.index');

});
