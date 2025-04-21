<?php

namespace Database\Seeders;

use App\Models\Backend\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSlidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::Create([
            'image' => 'uploads/sliders/slider1.jpg',
            'title' => 'Judul 1',
        ]);
        Slider::Create([
            'image' => 'uploads/sliders/slider2.jpg',
            'title' => 'Judul 2',
        ]);
        Slider::Create([
            'image' => 'uploads/sliders/slider3.jpg',
            'title' => 'Judul 3',
        ]);
    }
}
