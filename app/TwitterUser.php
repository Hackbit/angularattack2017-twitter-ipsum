<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwitterUser extends Model
{
	protected $table = "twitterUser";
	protected $primaryKey = "twitterUserId";
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = ["twitterUserId", "twitterUserAtHandle", "twitterUserImage"];

	public function ipsum() {
		return($this->hasMany("App\\Ipsum", "ipsumTwitterUserId"));
	}

	public function tweet() {
		return($this->hasMany("App\\Tweet", "tweetTwitterUserId"));
	}
}
