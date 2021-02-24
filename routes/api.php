<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DateController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\PlayerController;

Route::apiResources([
    'users' => UserController::class,
    'dates' => DateController::class,
    'players' => PlayerController::class,
    'posts' => PostController::class,
    'roles' => RoleController::class,
]);
Route::apiResource('date/{date}/games', GameController::class)->except([
    'store', 'destroy'
]);
Route::post('/user/eleven', [UserController::class, 'addEleven'])->name('add.eleven');
Route::post('/player/{player}', [PlayerController::class, 'detachPlayer'])->name('player.detach');
Route::get('/allgames', [GameController::class, 'allGames'])->name('game.all');
Route::post('/game', [GameController::class, 'store'])->name('game.store');
Route::delete('/game/{game}', [GameController::class, 'destroy'])->name('game.destroy');
Route::get('/game/{game}/players', [GameController::class, 'gameplayers'])->name('game.players');
Route::get('/game/{game}/users', [GameController::class, 'gameusers'])->name('game.users');
Route::get('/user/{user}/games', [UserController::class, 'usergames'])->name('user.games');
Route::get('/user/{user}/players', [UserController::class, 'userplayers'])->name('user.players');
Route::group(['prefix'=>'player'], function(){
    Route::apiResource('/{player}/score', ScoreController::class);
 });

//  jwt auth
Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});


