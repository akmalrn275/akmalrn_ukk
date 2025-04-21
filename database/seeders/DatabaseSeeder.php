<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DatabaseAdminSeeder::class,
            DatabaseConfigurationSeeder::class,
            DatabaseAboutSeeder::class,
            DatabaseSlidersSeeder::class,
            DatabaseGallerysSeeder::class,
            DatabaseCategorysBlogSeeder::class,
            DatabaseBlogsSeeder::class,
            DatabaseHistorysSeeder::class,
            DatabaseCategorysServiceSeeder::class,
            DatabaseImageCategorysServiceSeeder::class,
            ]);
    }
}
