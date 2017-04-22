<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ipsum extends Model
{
	protected $table = "ipsum";
	protected $primaryKey = "ipsumId";
	public $timestamps = false;

	protected $fillable = ["ipsumContent", "ipsumProfileId"];

	public function profile() {
		return($this->belongsTo("App\\Profile", "profileId"));
	}
}
