<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicants extends Model
{
    //
    protected $table = "applicants";


    public function getCreatedAtAttribute($date)
	{
	    return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
	}

	public function getUpdatedAtAttribute($date)
	{
	    return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
	}

    // Relationships
	public function job()
	{
	    return $this->belongsTo('App\Jobs');
	}

}


