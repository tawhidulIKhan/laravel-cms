<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            "key" => "site.title",
            "display_name" => "Site Title",
            "value"=>"Site Title"
        ]);
        
        Setting::create([
            "key" => "site.copyrighttext",
            "display_name" => "Copyright Text",
            "value"=>"Copyright @ 2019"
        ]);


    }
}
