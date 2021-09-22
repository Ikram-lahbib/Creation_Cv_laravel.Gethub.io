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

/*Route::get('/acceuil', function () {
    return view('acceuil');
});*/
/*Route::get('cvs', 'CvController@index');
Route::get('cvs/create', 'CvController@create');
Route::get('cvs/{id}', 'CvController@show');
Route::post('cvs', 'CvController@store');
Route::get('cvs/{id}/edit', 'CvController@edit');
Route::put('cvs/{id}', 'CvController@update');
Route::delete('cvs/{id}', 'CvController@destroy');*/

//equivalent a les  7 routes  si dessou
Route::resource('cvs','CvController');

//Route::get('/getexperiences/{id}','CvController@getexperiences');
Route::get('/getdata/{id}','CvController@getdata');
Route::post('/addexperience','CvController@addexperience');
Route::put('/updateexperience','CvController@updateexperience');
Route::delete('/deleteexperience/{id}','CvController@deleteexperience');
//Route de Module Formation
Route::post('/addformation','CvController@addformation');
Route::put('/updateformation','CvController@updateformation');
Route::delete('/deleteformation/{id}','CvController@deleteformation');
//Route de Module Competence
Route::post('/addcompetence','CvController@addcompetence');
Route::put('/updatecompetence','CvController@updatecompetence');
Route::delete('/deletecompetence/{id}','CvController@deletecompetence');
//Route de Module Projet
Route::post('/addprojet','CvController@addprojet');
Route::put('/updateprojet','CvController@updateprojet');
Route::delete('/deleteprojet/{id}','CvController@deleteprojet');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

