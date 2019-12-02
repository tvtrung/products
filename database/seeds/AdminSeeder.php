<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('admins')->truncate();
        DB::table('admins')->insert([
        	[
            'name' 		=> 'Trung Tran',
            'email' 	=> 'tvtrung1101@gmail.com',
            'password' 	=> bcrypt('123456'),
            'role'		=> 1,
            'status'	=> 1
	        ],
	        [
            'name' 		=> 'Editor',
            'email' 	=> 'editor@gmail.com',
            'password' 	=> bcrypt('123456'),
            'role'		=> 2,
            'status'	=> 1
	        ]
	    ]);
    }
}
