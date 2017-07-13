<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
         'username'     =>    'devboye',
         'name'         =>     'Olakunle Boye',
         'email'        =>     'kunlexzy@gmail.com',
         'roles'        =>      '3',
         'is_admin'		=>		'1',
         'password'		=>		bcrypt('abayomi45'),
         'created_at'  => Carbon::now(),
         'updated_at'  => Carbon::now()
        	]);
    }
}
