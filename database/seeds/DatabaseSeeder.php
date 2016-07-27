<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $this->call(UsersTableSeeder::class);
        
        // $this->call('RoleTableSeeder');
        // $this->command->info('This for Role Table seeder!');

        $this->call(PermissionTableSeeder::class);
        $this->command->info('This for Permission Table seeder!');
    }
}
