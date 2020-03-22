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





Route::get('/', 'ProjectController@index')->name('project.index');
Route::post('/projects', 'ProjectController@store')->name('project.store');


Route::get('/project/{id}/tasks', 'TaskController@index')->name('project.task');
Route::post("/project/{id}/tasks", "TaskController@store");
Route::post("/project/{id}/tasks/reorder", "TaskController@reorder");
Route::get("/project/{id}/tasks/delete", "TaskController@destroy");
Route::get('/tasks', 'TaskController@all')->name('task.all');
Route::post('/tasks/sort', 'TaskController@sort')->name('task.sort');
