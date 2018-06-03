<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Himanshu',
            'email' => 'himanshu@gmail.com',
            'password' => bcrypt('secret') 
        	]);
    }
}
