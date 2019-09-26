<?php

use \Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\User;

class FakeUsersSeeder extends Seeder {

	public function run()
	{

        // Check if table is empty to avoid duplicates
    	$check = User::count();
    	if($check == 0)
    	{

    		$user = new User;
    	
	    	$user->email = 'info@stunnermedia.com';
	    	$user->password = bcrypt('p@$$w0rdYPP');
	    	$user->name = 'Admin';

	    	$user->save();

    	}

	}

}
