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

Route::view('/', 'welcome');

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/botman/tinker', 'BotManController@tinker');

Route::resource('integration', 'IntegrationController')->middleware('auth');

Route::name('slack')->post('slack/{uuid}', 'SlackController');


Route::name('login')->get('login', 'LoginController@redirect');
Route::name('callback')->get('callback', 'LoginController@callback');
Route::name('logout')->post('logout', 'LoginController@logout');


//Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
