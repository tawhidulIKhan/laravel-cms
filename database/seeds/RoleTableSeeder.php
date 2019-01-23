<?php

use App\Role;
use App\Permission;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'superadministrator',
            'display_name' => 'Super Administrator'
        ]);
        
        $permissions = Permission::all()->pluck('id')->toArray();
        $role->permissions()->attach($permissions);

        $role = Role::create([
            'name' => 'admin',
            'display_name' => 'Admin'
        ]);
        
        $permissions = Permission::where('table_name','!=','users')->get()->pluck('id')->toArray();
        $role->permissions()->attach($permissions);



        $role = Role::create([
            'name' => 'author',
            'display_name' => 'Author'
        ]);
        
        $permissions = Permission::where(['table_name'=>'posts','table_name'=>'categories','table_name'=>'tags'])->get()->pluck('id')->toArray();
        $role->permissions()->attach($permissions);

    }
}
