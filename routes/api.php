<?php

use App\Ipsum;
use App\Profile;
use App\TwitterUser;
use App\Tweet;
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


Route::post("/ipsum", function (Request $request) {
	Ipsum::create($request->all());
});

Route::get('/ipsum', function () {
	return Ipsum::take(25)->orderBy("ipsumDateTime", "DESC")->get();
});

Route::get('/ipsum/{profileId}', function($profileId) {
	return Ipsum::where("ipsumProfileId", $profileId)->get();
});

Route::post("/profile", function (Request $request) {
	Profile::create($request->all());
});

Route::get("profile/{id}", function($id) {
	return Profile::where("profileId", $id)->get();
});

Route::post("/tweet", function(Request $request) {
	Tweet::create($request->all());
});

Route::get("/tweet/{tweetTwitterUserId}", function($twitterUserId) {
	return Tweet::where("tweetTwitterUserId", $twitterUserId)->get();
});

Route::post("/twitter-user", function(Request $request) {
	TwitterUser::create($request->all());
});

//Route::get("/twitter-user/{atHandle}", function($atHandle) {
//	$twitterUsers = TwitterUser::where("twitterUserAtHandle", $atHandle)->get();
//});
