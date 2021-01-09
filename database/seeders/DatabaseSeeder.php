<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(OrganizationsTableSeeder::class);
        $this->call(JobsTableSeeder::class);
        $this->call(RequirementsTableSeeder::class);
        $this->call(CategorizablesTableSeeder::class);
    }
}
