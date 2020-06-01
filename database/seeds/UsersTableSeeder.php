<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
      	'name' 		 => 'Test User',
      	'email' 	 => 'test@gmail.com',
      	'password' => bcrypt('12345678')
      ]);

      User::create([
        'name'     => 'Test User 2',
        'email'    => 'test2@gmail.com',
        'password' => bcrypt('12345678')
      ]);
    }
}
