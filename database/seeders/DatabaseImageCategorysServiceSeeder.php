<?php

namespace Database\Seeders;

use App\Models\Backend\ImageCategoryService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseImageCategorysServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ImageCategoryService::Create([
            'image' => 'uploads/category_services/image/category_service1.jpg',
            'category_service_id' => 1,
        ]);

        ImageCategoryService::Create([
            'image' => 'uploads/category_services/image/category_service2.jpg',
            'category_service_id' => 1,
        ]);

        ImageCategoryService::Create([
            'image' => 'uploads/category_services/image/category_service3.jpg',
            'category_service_id' => 2,
        ]);

        ImageCategoryService::Create([
            'image' => 'uploads/category_services/image/category_service4.jpg',
            'category_service_id' => 2,
        ]);

        ImageCategoryService::Create([
            'image' => 'uploads/category_services/image/category_service5.jpg',
            'category_service_id' => 3,
        ]);

        ImageCategoryService::Create([    
            'image' => 'uploads/category_services/image/category_service6.jpg',
            'category_service_id' => 3,
        ]); 
    }
}
