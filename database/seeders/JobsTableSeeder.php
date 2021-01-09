<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::factory()
            ->times(100)
            ->has(Requirement::factory()->count(10))
            ->create();
        //
    }
}
