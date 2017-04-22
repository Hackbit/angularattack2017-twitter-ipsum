<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $table = 'profile';
	protected $primaryKey = 'profileId';
	public $timestamps = false;


	public function store() {
		$input = \Request::json();
		$this->save();
	}

}
