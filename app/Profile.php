<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Profile extends Model
{
	protected $table = 'profile';
	protected $primaryKey = 'profileId';
	public $timestamps = false;

	protected $fillable = ['profileAccessToken', 'profileAtHandle', 'profileEmail', 'profileImage'];
}
