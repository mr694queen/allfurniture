<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            SiteSettingsSeeder::class,
            NavigationSeeder::class,
            CategoriesSeeder::class,
            CompanyFeaturesSeeder::class,
            OrderingStepsSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
