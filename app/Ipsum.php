<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ipsum extends Model
{
	protected $table = 'ipsum';
	protected $primaryKey = 'ipsumId';
	public $timestamps = false;

	//state variables and getters/setters here?

	public function store() {
		$input = \Input::json();
		//database insertion logic here
	}
}
