<?php

namespace Database\Seeders;

use App\Models\Backend\CategoryService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseCategorysServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryService::Create([
            'image' => 'uploads/category_services/img_1.jpg',
            'name' => 'Dua Kasur',
            'overview' => 'Jauh di sana, di balik pegunungan kata, jauh dari negeri Vokalia dan Konsonantia, hiduplah teks-teks buta. Terpisah mereka hidup di Bookmarksgrove tepat di pesisir Semantik, samudra bahasa yang besar.',
            'description' => '<p>Jauh di sana, di balik pegunungan kata, jauh dari negeri Vokalia dan Konsonantia, hiduplah teks-teks buta. Terpisah mereka hidup di Bookmarksgrove tepat di pesisir Semantik, samudra bahasa yang besar.</p><p>Jauh di sana, di balik pegunungan kata, jauh dari negeri Vokalia dan Konsonantia, hiduplah teks-teks buta. Terpisah mereka hidup di Bookmarksgrove tepat di pesisir Semantik, samudra bahasa yang besar.</p><p>Jauh di sana, di balik pegunungan kata, jauh dari negeri Vokalia dan Konsonantia, hiduplah teks-teks buta. Terpisah mereka hidup di Bookmarksgrove tepat di pesisir Semantik, samudra bahasa yang besar.</p>',
            'price' => '20000',
        ]);

        CategoryService::Create([
            'image' => 'uploads/category_services/img_2.jpg',
            'name' => 'Tiga Kasur',
            'overview' => 'Jauh di sana, di balik pegunungan kata, jauh dari negeri Vokalia dan Konsonantia, hiduplah teks-teks buta. Terpisah mereka hidup di Bookmarksgrove tepat di pesisir Semantik, samudra bahasa yang besar.',
            'description' => '<p>Jauh di sana, di balik pegunungan kata, jauh dari negeri Vokalia dan Konsonantia, hiduplah teks-teks buta. Terpisah mereka hidup di Bookmarksgrove tepat di pesisir Semantik, samudra bahasa yang besar.</p><p>Jauh di sana, di balik pegunungan kata, jauh dari negeri Vokalia dan Konsonantia, hiduplah teks-teks buta. Terpisah mereka hidup di Bookmarksgrove tepat di pesisir Semantik, samudra bahasa yang besar.</p><p>Jauh di sana, di balik pegunungan kata, jauh dari negeri Vokalia dan Konsonantia, hiduplah teks-teks buta. Terpisah mereka hidup di Bookmarksgrove tepat di pesisir Semantik, samudra bahasa yang besar.</p>',
            'price' => '30000',
        ]);

        CategoryService::Create([
            'image' => 'uploads/category_services/img_3.jpg',
            'name' => 'Empat Kasur',
            'overview' => 'Jauh di sana, di balik pegunungan kata, jauh dari negeri Vokalia dan Konsonantia, hiduplah teks-teks buta. Terpisah mereka hidup di Bookmarksgrove tepat di pesisir Semantik, samudra bahasa yang besar.',
            'description' => '<p>Jauh di sana, di balik pegunungan kata, jauh dari negeri Vokalia dan Konsonantia, hiduplah teks-teks buta. Terpisah mereka hidup di Bookmarksgrove tepat di pesisir Semantik, samudra bahasa yang besar.</p><p>Jauh di sana, di balik pegunungan kata, jauh dari negeri Vokalia dan Konsonantia, hiduplah teks-teks buta. Terpisah mereka hidup di Bookmarksgrove tepat di pesisir Semantik, samudra bahasa yang besar.</p><p>Jauh di sana, di balik pegunungan kata, jauh dari negeri Vokalia dan Konsonantia, hiduplah teks-teks buta. Terpisah mereka hidup di Bookmarksgrove tepat di pesisir Semantik, samudra bahasa yang besar.</p>',
            'price' => '40000',
        ]);
    }
}
