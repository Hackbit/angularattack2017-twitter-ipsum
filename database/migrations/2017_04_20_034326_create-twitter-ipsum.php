<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTwitterIpsum extends Migration {
	public function up() {
		Schema::create("profile", function(Blueprint $table) {
			$table->increments("profileId");
			$table->string("profileAccessToken", 64);
			$table->string("profileAtHandle", 32);
			$table->string("profileEmail", 128);
		});

		Schema::create("twitterUser", function(Blueprint $table) {
			$table->string("twitterUserId", 18);
			$table->string("twitterUserAtHandle", 64);
			$table->primary("twitterUserId");
		});

		Schema::create("ipsum", function(Blueprint $table) {
			$table->increments("ipsumId");
			$table->integer("ipsumProfileId")->unsigned();
			$table->string("ipsumContent", 5000);
			$table->timestamp("ipsumDateTime");
			$table->foreign("ipsumProfileId")->references("profileId")->on("profile");
		});

		Schema::create("tweet", function(Blueprint $table) {
			$table->string("tweetId", 18);
			$table->string("tweetTwitterUserId", 18);
			$table->string("tweetContent", 255);
			$table->foreign("tweetTwitterUserId")->references("twitterUserId")->on("twitterUser");
			$table->primary("tweetId");
		});
	}

	public function down() {
		Schema::drop("tweet");
		Schema::drop("ipsum");
		Schema::drop("twitterUser");
		Schema::drop("profile");
	}
}
