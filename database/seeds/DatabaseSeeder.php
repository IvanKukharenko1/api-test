<?php

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
        $this->call(PropertyAnalyticSeeder::class);
        $this->call(PropertySeeder::class);
        $this->call(AnalyticTypeSeeder::class);
    }
}
