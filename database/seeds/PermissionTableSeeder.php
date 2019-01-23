<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tables = ["permissions","categories","users","roles","posts","tags"];
        $actions = ["edit","create","delete","read"];
        
        foreach($tables as $table){
            foreach($actions as $action){
                
                $key = sprintf('%s_%s',$action,$table);
                $table_name = sprintf('%s',$table);
                
                Permission::create([
                    'key' => $key,
                    'table_name' => $table_name
                ]);
                    
            }
        }
    }
}
