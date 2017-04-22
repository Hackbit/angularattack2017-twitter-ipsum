<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
	protected $table = 'tweet';
	protected $primaryKey = 'tweetId';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = ['tweetId', 'tweetTwitterUserId', 'tweetContent'];

}
