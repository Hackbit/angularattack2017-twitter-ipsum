<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ipsum extends Model
{
	protected $table = "ipsum";
	protected $primaryKey = "ipsumId";
	public $timestamps = false;

	protected $fillable = ["ipsumContent", "ipsumTwitterUserId", "ipsumProfileId"];

	public function profile() {
		return($this->belongsTo("App\\Profile", "profileId"));
	}

	public function twitterUser() {
		return($this->belongsTo("App\\TwitterUser", "twitterUserId"));
	}
}
