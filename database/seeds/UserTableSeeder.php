<?php

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
      for($i = 0; $i < 2098; $i++){
        DB::table('users')->insert([
          'name' => str_random(11),
          'email' => str_random(11).'@yahoo.com',
          'password' => bcrypt('secret'),
          'role_id' => 2,
          'is_active' => 1
        ]);
      }
    }
}
