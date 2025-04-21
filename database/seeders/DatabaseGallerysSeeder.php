<?php

namespace Database\Seeders;

use App\Models\Backend\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseGallerysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gallery::Create([
            'image' => 'uploads/gallerys/gallery1.jpg',
        ]);

        Gallery::Create([
            'image' => 'uploads/gallerys/gallery2.jpg',
        ]);

        Gallery::Create([
            'image' => 'uploads/gallerys/gallery3.jpg',
        ]);

        Gallery::Create([
            'image' => 'uploads/gallerys/gallery4.jpg',
        ]);

        Gallery::Create([
            'image' => 'uploads/gallerys/gallery5.jpg',
        ]);

        Gallery::Create([
            'image' => 'uploads/gallerys/gallery6.jpg',
        ]);

        Gallery::Create([
            'image' => 'uploads/gallerys/gallery7.jpg',
        ]);
    }
}
