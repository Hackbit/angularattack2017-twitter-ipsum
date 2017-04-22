<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $table = "profile";
	protected $primaryKey = "profileId";
	public $timestamps = false;

	protected $fillable = ["profileAccessToken", "profileAtHandle", "profileEmail", "profileImage"];

	public function ipsum() {
		return($this->hasMany("App\\Ipsum", "ipsumProfileId"));
	}
}
