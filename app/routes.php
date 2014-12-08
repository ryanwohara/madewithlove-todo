<?php

Route::get('/', 'HomeController@showHome');

Route::post('/api/getTodos', 'ApiController@getTodos');
Route::post('/api/addTodo', 'ApiController@addTodo');
Route::post('/api/delTodo', 'ApiController@delTodo');
Route::post('/api/editTodo', 'ApiController@editTodo');
Route::post('/api/completeTodo', 'ApiController@completeTodo');
Route::post('/api/reactivateTodo', 'ApiController@reactivateTodo');


Route::get('/api/getTodos', 'ApiController@getTodos');
Route::get('/api/addTodo', 'ApiController@addTodo');
Route::get('/api/delTodo', 'ApiController@delTodo');
Route::get('/api/editTodo', 'ApiController@editTodo');
Route::get('/api/completeTodo', 'ApiController@completeTodo');
Route::get('/api/reactivateTodo', 'ApiController@reactivateTodo');