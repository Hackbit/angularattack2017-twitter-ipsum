<?php

use App\Ipsum;
use App\Profile;
use App\TwitterUser;
use App\Tweet;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;



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

Route::get('/ipsum/new/{twitterUserAtHandle}', function ($twitterUserAtHandle) {
	$twitterUser = TwitterUser::where("twitterUserAtHandle", $twitterUserAtHandle)->first();
	$tweets = Tweet::where("tweetTwitterUserId", $twitterUser->twitterUserId)->get();
	$tweetToShuffle = "";
	foreach ($tweets as $tweetObject) {
		$tweetToShuffle = $tweetToShuffle.$tweetObject->tweetContent." ";
	}

	$tweetToShuffle = explode(" ", $tweetToShuffle);
	shuffle($tweetToShuffle);
	$ipsum = implode(" ", $tweetToShuffle);
	return($ipsum);
});

Route::get('/ipsum/{profileId}', function($profileId) {
	return Ipsum::where("ipsumProfileId", $profileId)->get();
});

route::get('/ipsum/at-handle/{profileAtHandle}', function($profileAtHandle) {
	$profile = Profile::where("profileAtHandle", $profileAtHandle)->first();
	return Ipsum::where("ipsumProfileId", $profile->profileId)->get();
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

Route::get("/tweet/{tweetTwitterAtHandle}", function($tweetTwitterAtHandle) {
	try {
		$twitterUser = TwitterUser::where("tweetTwitterAtHandle", $tweetTwitterAtHandle)->firstOrFail();
	} catch(ModelNotFoundException $modelNotFoundException) {
		$twitterData = Twitter::getUserTimeline(["screen_name" => $tweetTwitterAtHandle, "format" => "json"]);
		dd($twitterData);
	} finally {
		return Tweet::where("tweetTwitterUserId", $twitterUser->twitterUserId)->get();
	}
});

Route::get("/tweet/{tweetTwitterUserId}", function($twitterUserId) {
	return Tweet::where("tweetTwitterUserId", $twitterUserId)->get();
});

Route::post("/twitter-user", function(Request $request) {
	TwitterUser::create($request->all());
});
