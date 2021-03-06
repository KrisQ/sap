<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        // $this->call(RolesTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(ArgumentsTableSeeder::class);
        $this->call(PostsTableSeeder::class);

    }
}
