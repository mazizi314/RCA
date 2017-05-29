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
//       first fill roles
         $this->call(RoleTableSeeder::class);
// next fill the users
        // $this->call(UsersTableSeeder::class);
    }
}
