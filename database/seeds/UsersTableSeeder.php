<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
         'role_id' => '1',
         'name' => 'Admin',
         'username' => 'admin',
         'email' => 'admin@gmail.com',
         'password' => Hash::make('rootadmin'),
     ]);
    DB::table('users')->insert([
         'role_id' => '2',
         'name' => 'Author',
         'username' => 'author',
         'email' => 'author@gmail.com',
         'password' => Hash::make('rootauthor'),
     ]);
    }
}
