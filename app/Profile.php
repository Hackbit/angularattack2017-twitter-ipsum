<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Profile extends Model
{
	protected $table = 'profile';
	protected $primaryKey = 'profileId';
	public $timestamps = false;

	protected $fillable = ['profileAccessToken', 'profileAtHandle', 'profileEmail'];



	private $profileAccessToken;
	private $profileAtHandle;
	private $profileEmail;


	public function store(Request $request) {
		$this->profileAccessToken = $request->input("profileAccessToken");
		$this->profileAtHandle = $request->input("profileAtHandle");
		$this->profileEmail = $request->input("profileEmail");
		//dd($this);
		$this->save();
	}

}
