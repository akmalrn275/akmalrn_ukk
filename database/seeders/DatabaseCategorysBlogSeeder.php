<?php

namespace Database\Seeders;

use App\Models\Backend\CategoryBlog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseCategorysBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryBlog::Create([
            'name' => 'Berita',
        ]);

        CategoryBlog::Create([
            'name' => 'Event',
        ]);
    }
}
