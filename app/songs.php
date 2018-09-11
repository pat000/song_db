<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class songs extends Model
{
    protected $table = "songs";
	protected $fillable = [
	      'title',
	      'artist',
	      'lyrics',
	     
	];
}
