<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $table = "jobs";
	protected $fillable = [
	      'title',
	      'description',
	     
	];


	// Relationships
	public function applicants()
	{
	    return $this->hasMany('App\Applicants');
	}
}


