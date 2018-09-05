<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Setting::create([

        	'site_name' => "Laravel's blog",
        	'address' => 'Bangladesh,Dhaka',
        	'contact_number'=> '008',
        	'contact_email' => 'info@laravel_blog.com'

        ]);
    }
}
