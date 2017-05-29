<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_user=new Role();
        $role_user->name='user';
        $role_user->description='normal user';
        $role_user->save();

        $role_user=new Role();
        $role_user->name='guest';
        $role_user->description='guest user';
        $role_user->save();

        $role_user=new Role();
        $role_user->name='admin';
        $role_user->description='admin user';
        $role_user->save();

    }
}
