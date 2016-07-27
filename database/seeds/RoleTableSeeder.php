<?php

use Illuminate\Database\Seeder;
use App\Role;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class RoleTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        //
  //       $owner = new Role();
		// $owner->name         = 'owner';
		// $owner->display_name = 'Project Owner'; // optional
		// $owner->description  = 'User is the owner of a given project'; // optional
		// $owner->save();

		// $admin = new Role();
		// $admin->name         = 'admin';
		// $admin->display_name = 'User Administrator'; // optional
		// $admin->description  = 'User is allowed to manage and edit other users'; // optional
		// $admin->save();

		// $admin = new Role();
		// $admin->name         = 'HR';
		// $admin->display_name = 'Human Resources'; // optional
		// $admin->description  = 'HR is allowed to manage and edit other users'; // optional
		// $admin->save();

		$admin = new Role();
		$admin->name         = 'Seller';
		$admin->display_name = 'Seller'; // optional
		$admin->description  = 'Sell is allowed to view and update products'; // optional
		$admin->save();
    }

}