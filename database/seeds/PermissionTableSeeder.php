<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $createPost = new Permission();
		$createPost->name         = 'create-user';
		$createPost->display_name = 'Create users'; // optional
		// Allow a user to...
		$createPost->description  = 'create new blog users'; // optional
		$createPost->save();

		// $editUser = new Permission();
		// $editUser->name         = 'edit-user';
		// $editUser->display_name = 'Edit Users'; // optional
		// // Allow a user to...
		// $editUser->description  = 'edit existing users'; // optional
		// $editUser->save();

		//$admin->attachPermission($createPost);
		// equivalent to $admin->perms()->sync(array($createPost->id));

		//$owner->attachPermissions(array($createPost, $editUser));
		// equivalent to $owner->perms()->sync(array($createPost->id, $editUser->id));
    }
}
