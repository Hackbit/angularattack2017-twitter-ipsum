<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwitterUser extends Model
{
	protected $table = 'twitterUser';
	protected $primaryKey = 'twitterUserId';
	public $incrementing = false;
	public $timestamps = false;

}
