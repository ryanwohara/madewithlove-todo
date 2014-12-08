<?php

Route::get('/', 'HomeController@showHome');

Route::post('/api/getTodos', 'ApiController@getTodos');
Route::post('/api/addTodo', 'ApiController@addTodo');
Route::post('/api/delTodo', 'ApiController@delTodo');
Route::post('/api/editTodo', 'ApiController@editTodo');
Route::post('/api/completeTodo', 'ApiController@completeTodo');
Route::post('/api/reactivateTodo', 'ApiController@reactivateTodo');