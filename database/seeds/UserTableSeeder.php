<?php

use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user =  User::create([
            'username' => 'superadmin',
            'email' => 'superadmin@superadmin.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password') 
        ]);

        $role = Role::where('name','superadministrator')->get()->pluck('id')->toArray();

        $user->roles()->attach($role);

        $user =  User::create([
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password') 
        ]);

        $role = Role::where('name','admin')->get()->pluck('id')->toArray();

        $user->roles()->attach($role);

        $user =  User::create([
            'username' => 'author',
            'email' => 'author@author.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password') 
        ]);

        $role = Role::where('name','author')->get()->pluck('id')->toArray();

        $user->roles()->attach($role);

    }
}
