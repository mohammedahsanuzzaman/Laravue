<?php

use Illuminate\Http\Request;


Route::apiResource('/question','QuestionController');


Route::apiResource('/category','CategoryController');


Route::apiResource('/question/{question}/reply','ReplyController');

Route::post('/{reply}/like','LikeController@Likeit');
Route::delete('/{reply}/like','LikeController@unLikeit');


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('payload', 'AuthController@payload');

});