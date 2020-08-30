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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'locale'], function() {
    Route::get('change-language/{language}', 'Language\LanguageController@changeLanguage')
        ->name('user.change-language');
});

Route::group(['prefix' => '/tasks'], function () {
    Route::get('/add_task', ['as' => 'tasks.add_task', 'uses' => 'Task\TaskController@getAddTasks']);
    Route::post('/add_task', ['as' => 'tasks.add_task', 'uses' => 'Task\TaskController@postAddTasks']);
    Route::get('/list_task', ['as' => 'tasks.list_task', 'uses' => 'Task\TaskController@index']);
    Route::get('/edit_task/{id}', ['as' => 'tasks.edit_task', 'uses' => 'Task\TaskController@getEditTasks']);
    Route::post('/edit_task/{id}', ['as' => 'tasks.edit_task', 'uses' => 'Task\TaskController@postEditTasks']);
    Route::get('/delete/{id}', ['as' => 'tasks.delete', 'uses' => 'Task\TaskController@delete']);
});
