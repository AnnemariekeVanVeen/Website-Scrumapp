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

use App\Http\Middleware\HasProject;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\ProjectExists;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Route::post('/add', 'HomeController@add')->name('AddBacklogItem');

Route::group(['prefix' => 'project/{project}'], function (){ // /{project}
    Route::resource('backlogItem', 'BacklogItemController');

    Route::resource('sprint', 'SprintController');

    Route::resource('retrospective', 'RetrospectiveController');

    Route::resource('retrospectiveComment', 'RetrospectiveCommentController');

    Route::post('attach', 'ProjectController@attach')->name('attach');

    Route::get('detach', 'ProjectController@detach')->name('detach');

    Route::get('addMember', 'ProjectController@add')->name('addMember');

});

Route::resource('project', 'ProjectController');

Route::resource('user', 'UserController');

Route::get('admin', 'UserController@admin')->name('admin');


