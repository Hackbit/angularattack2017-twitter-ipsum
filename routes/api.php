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
	if(empty(Session::get("profileId")) === true) {
		throw(new RuntimeException("You are not logged in. Please login with Twitter."));
	}
	$requestObject = $request->json();
	$twitterUser = TwitterUser::where("twitterUserAtHandle", $requestObject->get("twitterUserAtHandle"))->first();
	$tweets = Tweet::where("tweetTwitterUserId", $twitterUser->twitterUserId)->get();
	$tweetToShuffle = "";
	foreach($tweets as $tweetObject) {
		$tweetToShuffle = $tweetToShuffle . $tweetObject->tweetContent . " ";
	}

	$tweetToShuffle = explode(" ", $tweetToShuffle);
	shuffle($tweetToShuffle);
	$ipsum = implode(" ", $tweetToShuffle);
	Ipsum::create(["ipsumProfileId" => Session::get("profileId"), "ipsumContent" => $ipsum]);
});

Route::get('/ipsum', function () {
	return Ipsum::take(25)->orderBy("ipsumDateTime", "DESC")->get();
});

Route::get('/ipsum/{profileId}', function ($profileId) {
	return Ipsum::where("ipsumProfileId", $profileId)->get();
});

route::get('/ipsum/at-handle/{profileAtHandle}', function ($profileAtHandle) {
	$profile = Profile::where("profileAtHandle", $profileAtHandle)->first();
	return Ipsum::where("ipsumProfileId", $profile->profileId)->get();
});

Route::post("/profile", function (Request $request) {
	Profile::create($request->all());
});

Route::get("profile/{id}", function ($id) {
	return Profile::where("profileId", $id)->get();
});

Route::get("/tweetByTweetTwitterAtHandle/{tweetTwitterAtHandle}", function ($tweetTwitterAtHandle) {
	try {
		$twitterUser = TwitterUser::where("TwitterUserAtHandle", $tweetTwitterAtHandle)->firstOrFail();
	} catch(ModelNotFoundException $modelNotFoundException) {
		$twitterUser = null;
		$twitterData = json_decode(Twitter::getUserTimeline(["screen_name" => $tweetTwitterAtHandle, "format" => "json"]));
		foreach($twitterData as $tweet) {
			if($twitterUser === null) {
				// create a fake database record for the finally block and then insert into mySQL
				$twitterUser = new \stdClass();
				$twitterUser->twitterUserId = $tweet->user->id_str;
				TwitterUser::create(["twitterUserId" => $tweet->user->id_str, "twitterUserAtHandle" => $tweet->user->screen_name, "twitterUserImage" => $tweet->user->profile_image_url_https]);
			}

			$linkedTweetContent = Twitter::linkify($tweet);
			Tweet::create(["tweetId" => $tweet->id_str, "tweetTwitterUserId" => $tweet->user->id_str, "tweetContent" => $linkedTweetContent]);
		}
	} finally {
		return (Tweet::where("tweetTwitterUserId", $twitterUser->twitterUserId)->get());
	}
});

Route::get("/tweet/{tweetTwitterUserId}", function ($twitterUserId) {
	return Tweet::where("tweetTwitterUserId", $twitterUserId)->get();
});
