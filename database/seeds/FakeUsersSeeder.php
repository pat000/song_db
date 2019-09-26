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
    	
	    	$user->username = 'YPPadmin';
	    	$user->password = bcrypt('p@$$w0rdYPP');
	    	$user->first_name = 'Admin';
	    	$user->nick_name = 'Admin';
	    	$user->admin = 1;
	    	$user->active = 1;

	    	$user->save();

    	}

	}

}
