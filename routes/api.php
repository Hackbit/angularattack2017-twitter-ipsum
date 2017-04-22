<?php

use App\Ipsum;
use App\Profile;
use Illuminate\Http\Request;



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


Route::post("/ipsum", function () {
	$ipsum = new Ipsum();
	$ipsum->store();
});

//Route::get('/ipsum', function () {
//
//});


Route::post("/profile", function (Request $request) {
	Profile::create($request->all());
});
