<?php

use Illuminate\Http\Request;
include(__DIR__.'../app/Ipsum.php');
include(__DIR__.'../app/Profile.php');
include(__DIR__.'../app/Tweet.php');
include(__DIR__.'../app/TwitterUser.php');



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/ipsum', function () {
	$ipsum = new Ipsum;
	$ipsum->store();
});

//Route::get('/ipsum', function () {
//
//});
//
//Route::put('/ipsum', function () {
//
//});
//
//Route::delete('/ipsum', function () {
//
//});
