<?php

use Illuminate\Database\Seeder;

class HorcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Horc::class, 15000)->create();
    }
}
