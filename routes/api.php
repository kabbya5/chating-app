<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReplayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('signup','AuthController@signup');

});

Route::apiResource('/questions',QuestionController::class);

Route::apiResource('/categories',CategoryController::class);

Route::apiResource('/questions.replay',ReplayController::class);
Route::post('/like/{replay}',[LikeController::class,'store']);
Route::delete('/like/{replay}',[LikeController::class,'destroy']);

Route::post('/notifications', function(){
    return [
        'read' => auth()->user()->readNotifications,
        'unread' => auth()->user()->unreadNotifications,

    ];
});


