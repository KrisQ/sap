<?php

use Illuminate\Database\Seeder;

class ArgumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Argument::class, 10)->create();

    }
}
